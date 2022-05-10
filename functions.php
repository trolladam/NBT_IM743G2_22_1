<?php

function dd($variable)
{
    dump($variable);
    die('END');
}

function dump($variable)
{
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}

function asset($asset)
{
    return BASE_URL . $asset . '?v=' . APP_VERSION;
}

function page_url($page, $params = [])
{
    $url =  BASE_URL . "?p=$page";
    if (is_array($params) && count($params) > 0) {
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
    }
    return $url;
}

function redirect($page, $params = [])
{
    $url = page_url($page, $params);
    header("Location: $url");
    die();
}

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function db_connect()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        if (DEBUG) {
            die("Connection failed: {$conn->connect_error}");
        }
        die("Connection failed");
    }

    return $conn;
}


function db_close($db)
{
    $db->close();
}

function get_album_by_id($id)
{
    global $db;

    $id = $db->real_escape_string($id);
    $result = $db->query("SELECT * FROM albums WHERE id = $id");

    return $result->fetch_assoc();
}

function get_album_list($offset = 0, $limit = PAGE_LIMIT)
{
    global $db;

    $sql = "SELECT * FROM albums";

    $limit = $db->real_escape_string($limit);
    $offset = $db->real_escape_string($offset);

    $sql .= " LIMIT $limit OFFSET $offset";

    return $db->query($sql);
}

function get_album_count()
{
    global $db;

    $sql = "SELECT COUNT(*) as count FROM albums";
    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    return is_array($row) ? $row['count'] : 0;
}


function log_in_user($id)
{
    $_SESSION['user_id'] = $id;
}

function user_logged_in()
{
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null;
}

function current_user()
{
    global $db;

    if (!user_logged_in()) {
        return null;
    }

    $sql = $db->prepare("SELECT * FROM users WHERE id = ?");
    $sql->bind_param('i', $_SESSION["user_id"]);
    $sql->execute();

    return $sql->get_result()->fetch_assoc();
}

function log_out_user()
{
    $_SESSION = [];
    session_destroy();
}
