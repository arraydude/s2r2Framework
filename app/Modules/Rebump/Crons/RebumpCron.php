<?php
namespace Rebump\Crons;

use Rebump\Models\File;
use Rebump\Models\Bump;
use Framework\Models\User;
use Framework\Library\Twig\Twig;
use Framework\Config;

class RebumpCron extends \Framework\BaseCron
{
    protected function _execute()
    {
        $fileModel = new File;
        $this->writeOutput('Fetching files');
        $files = $fileModel->fetchAll(array('status' => File::STATUS_PENDING));

        if (empty($files)) {
            $this->writeOutput('Not Files Found');
        } else {
            $currentFile = $files[0];
            $fileId = $currentFile['file_id'];
            $this->writeOutput('Current file id = ' . $fileId);
            $path = $fileModel->getUploadPath($fileId);
            $ids = explode(PHP_EOL, file_get_contents($path));
            $this->writeOutput('Saving file with status RUNNING');
            $fileModel->save(array('status' => File::STATUS_RUNNING), $fileId);

            $bump = new Bump;
            foreach ($ids as $id) {
                if (is_numeric($id)) {
                    $this->writeOutput('bumping id = ' . $id);
                    $bump->bump($id);
                }
            }

            $this->writeOutput('Saving file with status FINISHED');
            $fileModel->save(array('status' => File::STATUS_FINISHED), $fileId);

            $userModel = new User;
            $user = $userModel->find($currentFile['user_id'], false);

            $mail = new \PHPMailer;
            $emailFromSystem = Config::get('framework.email_from.system');
            $mail->setFrom($emailFromSystem['address'], $emailFromSystem['name']);
            $mail->addAddress($user['email'], $user['name']);
            $this->writeOutput('Sending email to: ' . $user['email'] . ' - ' . $user['name']);
            $mail->Subject = "Rebump process finished";

            $body = Twig::getHtmlSource('@RebumpModule/Email/RebumpFinished.twig');
            $mail->msgHTML($body);
            $mail->send();
        }
    }
}
