<?php

require 'include.php';

$route = new Routes();
$routes = $route->GetRoutes();
// var_dump($routes);

if (empty($routes))
    // throw error
    die();
else {
    // swiching on route[1] as route[0] is 'api'
    switch ($routes[1]) {
        case 'register':
            LoadAPI('register');
        break;

        case 'login':
            LoadAPI('login');
        break;

        case 'logout':
            LoadAPI('logout');
        break;

        case 'settings':
            LoadAPI('user-settings');
        break;

        // switching on create APIs
        case 'create':
            switch ($routes[2]) {
                case 'question':
                    LoadAPI('create.question');
                break;
                
                case 'comment':
                    LoadAPI('create.comment');
                break;

                default:
                    // throw some error
            }
        break;

        // switching on fetching APIs
        case 'fetch':
            switch($routes[2]) {
                case 'question':
                    switch($routes[3]) {
                        case 'nearby':
                            LoadAPI('fetch.question.nearby');
                        break;
                        case 'trending':
                            LoadAPI('fetch.question.trending');
                        break;
                        case 'top':
                            LoadAPI('fetch.question.top');
                        break;
                        default:
                        // throw some error    
                    }
                break;
                
                case 'comment':
                    LoadAPI('fetch.comment');
                break;

                default:
                    // throw some error
            }
            break;
        // switch on reporting action
        case 'report':
            switch ($routes[2]) {
                case 'user':
                    LoadAPI('report-user');
                break;

                case 'post':
                    LoadAPI('report-post');
                break;

                case 'comment':
                    LoadAPI('report-comment');
                break;

                default:
                    // throw some error
            }
        break;
    
        // switching on rateing APIs
        case 'rate':
            switch($routes[2]) {
                case 'user':
                    LoadAPI('rate.user');
                break;

                case 'question':
                    LoadAPI('rate.question');
                break;

                case 'comment':
                    LoadAPI('rate.comment');
                break;

                default:
                    // throw some error
            }
        break;

        // switching on loading post and comment APIs
        case 'load':
            switch($routes[2]) {
                // switch on post filtering
                case 'posts':
                    switch ($routes[3]) {
                        case 'nearby':
                            LoadAPI('posts-nearby');
                        break;

                        case 'trending':
                            LoadAPI('posts-trending');
                        break;

                        case 'top':
                            LoadAPI('posts-top');
                        break;

                        default:
                            // throw some error
                    }
                break;

                // switch on comment ordering
                case 'comments':
                    switch ($routes[3]) {
                        case 'top':
                            LoadAPI('comments-top');
                        break;

                        case 'new':
                            LoadAPI('comments-new');
                        break;

                        case 'old':
                            LoadAPI('comments-old');
                        break;

                        default:
                            // throw some error
                    }
                break;

                default:
                    // throw some error
            }
        break;

        default:
            // throw some random error
    }
}

?>
