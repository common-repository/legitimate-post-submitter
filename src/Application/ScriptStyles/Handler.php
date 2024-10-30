<?php
namespace Legitimate\Application\ScriptStyles;

class Handler
{

    public function loadAdminScriptStyles($hook_suffix)
    {
        $adminScripts = new AdminScripts($hook_suffix);
        $adminStyles = new AdminStyles($hook_suffix);
	}
}