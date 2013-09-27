<?php

namespace attitude\Elements;

use \attitude\Elements\Singleton_Prototype;

class Auth_Element extends Singleton_Prototype
{
    private $application = null;
    private $user        = null;

    private $app_tokens_storage = null;
    private $users_storage = null;

    private function __construct($app_public_key, $app_signage, $user, $pswd)
    {
        $this->setApplication($app_public_key, $app_signage);
        $this->setUser($user, $pswd);
    }

    private function setApplication($app_public_key = null, $app_signage = null)
    {
        if (!(is_string($app_public_key) || is_int($app_public_key))) {
            trigger_error('Only strings and integers are aallowed in app token string.');
            throw new HTTPException(406);
        }

        if (preg_match_all('|[^0-9abcdef]+|', $app_public_key, $devnull)) {
            trigger_error('Only `[0-9abcdef]` characters are allowed in app token string.');
            throw new HTTPException(406);
        }
    }
}
