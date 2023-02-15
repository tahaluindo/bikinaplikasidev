<?php

namespace App\Console\Commands;

use App\Notifikasi;
use App\User;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class RunSocket extends Command implements MessageComponentInterface
{
    protected $clients;
    protected $users;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RunSocket:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk menjalankan websocket server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->clients = new \SplObjectStorage;
        $this->users = collect();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {

        if(preg_match("/4564747567568686786/", $msg)) {



        } else {
            if (strlen($msg)) {
                $user_id = substr($msg, 0, strpos($msg, '$'));
                $hash = substr($msg, strpos($msg, '$'));
                if (password_verify('Bikin Aplikasi Dev' . date("Y-m-d h:i"), $hash)) {
                    if (!$this->users->where('user_id', $user_id)->count()) {
                        echo "Client ditambahkan karena belum ada di list. \r\n";

                        $this->users->add([
                            'user_id' => $user_id,
                            'user' => User::findOrFail($user_id),
                            'client' => $from
                        ]);

                        $from->send("Kamu telah ditambahkan dalam antrian");
                    }
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        $this->users = $this->users->reject(function($item) use($conn) {

            return $item['client']->resourceId == $conn->resourceId;
        });

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        set_time_limit(0);

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    $this
                )
            ),
            4001
        );

        $server->run();
    }
}
