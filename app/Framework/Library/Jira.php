<?php

namespace Framework\Library;

use Framework\Config;

class Jira
{
    const REQUEST_GET    = "GET";
    const REQUEST_POST   = "POST";
    const REQUEST_PUT    = "PUT";
    const REQUEST_DELETE = "DELETE";
    const TYPE_PROJECT   = "Project";
    const TYPE_TASK      = "Task";

    public function createIssue($projectKey, $summary, $issueType, $options = array())
    {
        $default = array(
            "project"   => array(
                "key" => $projectKey,
            ),
            "summary"   => $summary,
            "issuetype" => array(
                "name" => $issueType,
            ),
        );

        $default = array_merge($default, $options);

        $result = $this->sendRequest(
            self::REQUEST_POST,
            "issue/",
            array("fields" => $default)
        );

        return $result;
    }

    public function addComment($issue, $params)
    {
        if (is_string($params)) {
            $params = array(
                'body' => $params
            );
        }

        return $this->sendRequest(self::REQUEST_POST, sprintf("issue/%s/comment", $issue), $params);
    }

    public function getIssue($issue)
    {
        return $this->sendRequest(self::REQUEST_GET, "issue/" . $issue);
    }

    public function updateIssue($issue, $params = array())
    {
        return $this->sendRequest(self::REQUEST_PUT, sprintf("issue/%s", $issue), $params);
    }

    public function updateIssueDescription($issue, $text = '')
    {
        $options = array(
            "update" => array(
                "description" => array(
                    array("set" => $text)
                )
            )
        );

        $this->sendRequest(self::REQUEST_PUT, sprintf("issue/%s", $issue), $options);

        return $issue;
    }

    public function createAttachment($issue, $filename, $filePath, $options = array())
    {
        $options = array_merge(
            array("file" => "@{$filePath};filename={$filename}"),
            $options
        );

        return $this->sendRequest(self::REQUEST_POST, sprintf("issue/%s/attachments", $issue), $options, true);
    }

    public function getTransitions($issue, $params = array())
    {
        return $this->sendRequest(self::REQUEST_GET, sprintf("issue/%s/transitions", $issue), $params);
    }

    public function transition($issue, $params)
    {
        return $this->sendRequest(self::REQUEST_POST, sprintf("issue/%s/transitions", $issue), $params);
    }

    public function assigne($issue, $params)
    {
        return $this->sendRequest(self::REQUEST_PUT, sprintf("issue/%s/assignee", $issue), $params);
    }

    public function sendRequest($method, $url, $data = array(), $isFile = false)
    {
        $curl = curl_init();

        if ($method == self::REQUEST_GET) {
            $url .= "?" . http_build_query($data);
        }

        curl_setopt($curl, CURLOPT_URL, Config::get('jira.url') . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $curl, CURLOPT_USERPWD, sprintf("%s:%s", Config::get('jira.username'), Config::get('jira.password'))
        );
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);

        if ($isFile) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-Atlassian-Token: nocheck'));
        } else {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json;charset=UTF-8"));
        }

        if ($method == self::REQUEST_POST) {
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($isFile) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            } else {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
        } elseif ($method == self::REQUEST_PUT) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, self::REQUEST_PUT);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $data = curl_exec($curl);

        $errorNumber = curl_errno($curl);
        if ($errorNumber > 0) {
            throw new JiraException(
                sprintf('Jira request failed: code = %s, "%s"', $errorNumber, curl_error($curl))
            );
        }

        if (is_null($data)) {
            throw new JiraException('JIRA Rest server returns unexpected result.');
        }

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) > 300) {
            throw new JiraException(
                'JIRA Rest server returns unexpected result - Response: ' . $data
            );
        }

        return json_decode($data, true);
    }
}

class JiraException extends \Exception
{
}
