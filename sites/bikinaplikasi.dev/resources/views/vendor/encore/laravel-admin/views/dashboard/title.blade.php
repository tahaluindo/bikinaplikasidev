<style>
    .title {
        font-size: 50px;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        display: block;
        text-align: center;
        margin: 20px 0 10px 0px;
    }

    .links {
        text-align: center;
        margin-bottom: 20px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>

<div class="title">
    Bikin Aplikasi
</div>
<div class="links">
    Link Rujukan: <input id="link_rujukan" value="{{ route('r.user_id', \Admin::user()->id) }}"></input>
    <button type="submit" id="btn_link_rujukan" class="btn btn-primary btn-rounded btn-sm" style="margin-top: -2.5px">Copy</button>
    <br>
    <strong class="text-danger">*</strong> Bonus rujukan hanya diberikan kepada orang yg <br> admin kenal / sudah pernah / sedang memesan. <br>Dibayarkan ketika pelunasan oleh client selesai.
</div>

<script>
    $(document).ready(function (e) {
        $('#btn_link_rujukan').click(function () {
            /* Get the text field */
            var copyText = document.getElementById("link_rujukan");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Link berhasil dicopy, daftarkan temanmu dan dapatkan komisi untuk setiap pembelian! " + copyText.value);
        })
    })
</script>