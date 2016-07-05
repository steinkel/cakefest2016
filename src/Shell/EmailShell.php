<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\Email;

/**
 * Email shell command.
 */
class EmailShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main()
    {
        $this->out($this->OptionParser->help());
    }

    public function test()
    {
        debug(Email::deliver('me@example.com', 'test subject', 'test body', 'default'));
    }

    public function stuff()
    {
        $this->helper('Progress')->output(['callback' => function ($progress) {
            // Do work here.
            $progress->increment(20);
            $progress->draw();
            sleep(1);

            $progress->increment(20);
            $progress->draw();
            sleep(1);
            $progress->increment(80);
            $progress->draw();
        }]);
    }
}
