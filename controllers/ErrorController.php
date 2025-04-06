<?php
class ErrorController {
    public function notFound() {
        http_response_code(404);
        include_once 'views/error/404.php';
    }
}
?>