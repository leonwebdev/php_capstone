<?php

/**
 * Load view with data
 *
 * @param string $view_name
 * @param array $data
 * @return void
 */
function view(string $view_name, array $data = []): void
{
    try {
        extract($data);
        // title and content now visible in this scope
        $path = __DIR__ . '/../views/' . $view_name . '.view.php';
        if (!file_exists($path)) {
            throw new Exception('View ' . $path . ' not found.');
        }
        require($path);
    } catch (Exception $e) {
        echo $e->getMessage();
        die;
    }
}

function dd($var)
{
    echo '<pre>';
    print_r($var);
    die;
}

function dc()
{
    if (defined('ENV') && ENV !== 'production') {
        if (func_num_args()) {
            $out = func_get_args();
        } else {
            $out = $GLOBALS;
        }
        $json = json_encode($out);
        echo "<script>console.log($json)</script>";
    }
}
