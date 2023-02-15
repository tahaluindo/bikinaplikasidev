<?php

namespace App\Controllers;

class SuhuDanDetakJantung extends BaseController
{
    protected $request;
    protected $model;
    protected $validation;
    protected $data;

    public function __construct()
    {
        $this->model = new \App\Models\Sensor();
        $this->request = \Config\Services::request();
        $this->data['validation'] = \Config\Services::validation();
    }

    public function index()
    {
        if (user_id() == 1) {
            $sensor = $this->model->limit(15)->orderBy('id', 'DESC');

            $sensor = array_filter($sensor->get()->getResultObject(), function ($item) {

                return $item->denyut >= 0 && $item->denyut <= 150 && $item->suhu >= 27 && $item->suhu <= 38;
            });

            $user_ids = [0];
            foreach ($sensor as $item) {
                $user_ids[] = $item->user_id;
            }

            $users = (new \App\Models\User)->whereIn('id', $user_ids);
            $data['users'] = $users->get()->getResultObject();

            if ($this->request->getGet('user_id')) {
                if (!file_put_contents("user_id_login.txt", $this->request->getGet('user_id'))) {
                    die("Gagal membuat user id login");
                }

                $data['username'] = $users->find($this->request->getGet('user_id'))->username;
            } else {
                $data['username'] = $users->first()->username;
            }
        } else {
            $data['users'] = [];
            $data['username'] = user()->username;
        }

        return view('suhu_dan_detak_jantung/index', $data);
    }

    public function chart()
    {
        header("content-type: application/json");
        header("HTTP/1.1 200 OK");

        if (user_id() == 1) {
            if ($this->request->getGet('user_id')) {

                $sensor = $this->model->limit(15)->orderBy('id', 'desc');

                if (!$sensor->first()) {
                    die(json_encode([
                        'error' => 1,
                        'message' => "Data sensor tidak ditemukan!"
                    ]));
                }

                $sensor = array_filter($sensor->get()->getResultObject(), function ($item) {

                    return $item->denyut >= 0 && $item->denyut <= 150 && $item->suhu >= 27 && $item->suhu <= 38 && $item->user_id == $this->request->getGet('user_id');
                });
                $sensor = array_values($sensor);

                $user = (new \App\Models\User)->find($sensor[0]->user_id);
            } else {
                $sensor = $this->model->limit(15)->orderBy('id', 'desc');

                if (!$sensor->first()) {
                    die(json_encode([
                        'error' => 1,
                        'message' => "Data sensor tidak ditemukan!"
                    ]));
                }

                $sensor = array_filter($sensor->get()->getResultObject(), function ($item) {
                    return $item->denyut >= 0 && $item->denyut <= 150 && $item->suhu >= 27 && $item->suhu <= 38 && $item->user_id == 1;
                });

                $sensor = $this->model->limit(15)->orderBy('id', 'desc');

                $sensor = array_filter($sensor->get()->getResultObject(), function ($item) {
                    return $item->denyut >= 0 && $item->denyut <= 150 && $item->suhu >= 27 && $item->suhu <= 38 && $item->user_id == 1;
                });
                $sensor = array_values($sensor);
            }

        } else {
            $sensor = $this->model->limit(15)->orderBy('id', 'desc');

            if (!$sensor->first()) {
                die(json_encode([
                    'error' => 1,
                    'message' => "Data sensor tidak ditemukan!"
                ]));
            }

            $sensor = array_filter($sensor->get()->getResultObject(), function ($item) {
                return $item->denyut >= 0 && $item->denyut <= 150 && $item->suhu >= 27 && $item->suhu <= 38 && $item->user_id == user_id();
            });
            $sensor = array_values($sensor);

        }

        $labels = [];
        foreach ($sensor as $key => $item) {
            $start = count($sensor) - 15;
            if ($key <= $start) {
                continue;
            }

            $labels[] = $item->created_at;
        }

        $datasetsData = [];
        foreach ($sensor as $key => $item) {
            $start = count($sensor) - 15;
            if ($key <= $start) {
                continue;
            }

            $datasetsData[] = $item->denyut;
        }

        $datasets = [
            [
                "label" => "Earnings",
                "lineTension" => 0.3,
                "backgroundColor" => "rgba(78, 115, 223, 0.05)",
                "borderColor" => "rgba(78, 115, 223, 1)",
                "pointRadius" => 3,
                "pointBackgroundColor" => "rgba(78, 115, 223, 1)",
                "pointBorderColor" => "rgba(78, 115, 223, 1)",
                "pointHoverRadius" => 3,
                "pointHoverBackgroundColor" => "rgba(78, 115, 223, 1)",
                "pointHoverBorderColor" => "rgba(78, 115, 223, 1)",
                "pointHitRadius" => 10,
                "pointBorderWidth" => 2,
                "data" => ($datasetsData)
            ]
        ];

        $json = [
            "error" => 0,
            "message" => "Data ditemukan.",
            "labels" => $labels,
            "datasets" => $datasets,
            "suhu" => $sensor[count($sensor) - 1]->suhu
        ];

        die(json_encode($json));
    }

    public function kirim_ke_email()
    {
        $sensor = $this->model->orderBy('id', 'DESC');
        $sensor = array_filter($sensor->get()->getResultObject(), function ($item) {

            return $item->denyut >= 0 && $item->denyut <= 150 && $item->suhu >= 27 && $item->suhu <= 38;
        });

        $row = [];
        foreach ($sensor as $key => $item) {
            $no = $key + 1;
            $user = (new \App\Models\User)->find($item->user_id);
            $row[] = "<tr> <td>$no</td> <td>$user->username</td> <td>$item->suhu</td> <td>$item->denyut</td> <td>$item->created_at</td> </tr>";
        }

        $rows = implode("", $row);

        $table = "<table><thead><tr><td style='width: 5px;'>No</td><td>User</td><td>Suhu</td><td>Denyut</td><td>Created At</td></tr></thead><tbody>$rows</tbody></table>";

        // Create the Transport
        $transport = (new \Swift_SmtpTransport('chewbacca.id.rapidplex.com', 465, 'ssl'))
            ->setUsername('admin@kesehatan-smash.site')
            ->setPassword('http://kesehatan-smash.site');

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Laporan Suhu dan Detak Jantung per 6 Jam'))
            ->setFrom(['admin@kesehatan-smash.site' => 'Admin Kesehatan Smash'])
            ->setTo([$this->request->getGet('email')])
            ->setBody("
                    <h2>Laporan Suhu dan Detak Jantung</h2>
                    
                    $table 
                
                ")
            ->setContentType('text/html');

        // Send the message
        try {
            $result = $mailer->send($message);

            if (!$this->model->like('id', '')->delete()) {
                die("Gagal mengosongkan table");
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        die(json_encode([
            'success' => true,
            'message' => 'Berhasil mengirimkan data ke email: ' . $this->request->getGet('email')
        ]));
    }

    // untuk api
    public function store()
    {
//        header("Content-Type: application/json");
        if (!$this->validate([
            'suhu' => 'required|greater_than[26]|less_than[39]',
            'denyut' => 'required|greater_than[-1]|less_than[151]'
        ])) {
            die(json_encode([
                'success' => false,
                'error' => 'Terjadi kesalahan penginputan suhu / denyut. Suhu minimal 27 dan Maximal 38, denyut minimal 0 dan maximal 150'
            ]));
        }

        $db = \Config\Database::connect();
        if (!$db->table($this->model->getTable())->insert([
            'suhu' => $this->request->getGet('suhu'),
            'denyut' => $this->request->getGet('denyut'),
            'user_id' => file_get_contents("user_id_login.txt")
        ])) {

            die(json_encode([
                'success' => false,
                'error' => 'Terjadi kesalahan saat menyimpan data ke database.'
            ]));
        }

        die(json_encode([
            'success' => true,
            'message' => 'Berhasil melakukan penginputan suhu dan denyut.'
        ]));
    }
}
