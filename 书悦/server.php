<?php
set_time_limit(0);

require 'class.PHPWebSocket.php';

// 建立连接数据库
$db_conn = mysqli_connect('localhost', 'root', '123456', 'bookstore');
function wsOnMessage($clientID, $message, $messageLength, $binary) {
    global $Server;
    $ip = long2ip( $Server->wsClients[$clientID][6] );
    $Server->log("Received raw data from client $clientID: $message");

    // 将接收到的消息写入数据库
    // 解析接收到的消息
    global $db_conn;
    // 解析出用户名和时间
    list($username, $datetime, $content) = explode(' ', $message, 3);
    // 处理客户端发送的消息
    $query = "INSERT INTO chatmessage (sender, created_at, content) VALUES ('$username', '$datetime', '$content')";
    mysqli_query($db_conn, $query);

    // 将消息发送给其他客户端
    $messageData = array(
        'username' => $username,
        'content' => $content,
        'datetime' => $datetime
    );
    $messageToSend = json_encode($messageData);

    foreach ($Server->wsClients as $id => $client) {
        if ($id != $clientID) {
            $Server->wsSend($id, $messageToSend);
        }
    }


}


function wsOnOpen($clientID)
{
    global $Server;
    $ip = long2ip( $Server->wsClients[$clientID][6] );
    $Server->log( "$ip ($clientID) has connected." );

    // Send previous messages to the new client
    global $db_conn;
    $query = "SELECT * FROM chatmessage ORDER BY created_at ASC";
    $result = mysqli_query($db_conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $username = utf8_encode($row['sender']);
        $datetime = utf8_encode($row['created_at']);
        $content = utf8_encode($row['content']);

        $messageData = array(
            'username' => $username,
            'content' => $content,
            'datetime' => $datetime
        );
        $messageToSend = json_encode($messageData);

        $Server->wsSend($clientID, $messageToSend);
    }

    // Add the new client to the list of clients
    $Server->wsClients[$clientID]['connected'] = true;
    // Add the client ID to the disconnected clients table
    global $db_conn;
    $query = "INSERT INTO disconnected_clients (client_id) VALUES ('$clientID')";
    mysqli_query($db_conn, $query);

}

function wsOnClose($clientID, $status) {
    global $Server;
    $ip = long2ip( $Server->wsClients[$clientID][6] );
    $Server->log( "$ip ($clientID) has disconnected." );
    // 在客户端连接断开时，将连接ID写入数据库
    global $db_conn;
    $query = "DELETE FROM disconnected_clients WHERE client_id='$clientID'";
    mysqli_query($db_conn, $query);
}

$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');
$Server->wsStartServer('127.0.0.1', 9300);

?>


