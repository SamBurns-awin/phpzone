<?php

namespace PhpZone\PhpZone\Console;

use Symfony\Component\Console\Shell as BaseShell;

class Shell extends BaseShell
{
    /**
     * @return string
     */
    protected function getHeader()
    {
        $version = $this->getApplication()->getVersion();

        return <<<EOF
<options=bold>      ____  _          _____
     |  _ \| |__  _ __|__  /___  _ __   ___
     | |_) | '_ \| '_ \ / // _ \| '_ \ / _ \
     |  __/| | | | |_) / /| (_) | | | |  __/
     |_|   |_| |_| .__/____\___/|_| |_|\___|    <fg=yellow;options=bold>version {$version}</fg=yellow;options=bold>
                 |_|</options=bold>

At the prompt, type <comment>help</comment> for some help,
or <comment>list</comment> (or press ENTER) to get a list of available commands.

To exit the shell, type <comment>^D</comment>.

<fg=cyan>Tip: The shell environment supports an autocomplete and a command history.</fg=cyan>

EOF;
    }

    /**
     * @return string The prompt
     */
    protected function getPrompt()
    {
        // using the formatter here is required when using readline
        return $this->getOutput()->getFormatter()->format(
            '<fg=green;options=bold>' . $this->getApplication()->getName() . '</fg=green;options=bold> > '
        );
    }
}
