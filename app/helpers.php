<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('access')) {
/**
* Access (lol) the Access:: facade as a simple function.
*/
function access()
{
return app('access');
}
}