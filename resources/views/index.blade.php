<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <h1>Hello, world!</h1>

    <form method="post">
        <label>Jurusan</label>
        <select class="form-control select2" name="major" id="jurusan">
            <option disabled checked="true" selected="true">pilih Jurusan</option>
            @foreach($major as $data)
            <option value="{{$data->id}}">{{$data->major_name}}</option>
            @endforeach
        </select><br><br>

        <label>Kelas</label>
        <select class="form-control select2" name="class" id="kelas">
            <option></option>
        </select><br><br>

        <label>Nama Siswa</label>
        <select class="form-control select2" name="student" id="siswa">
            <option></option>
        </select><br><br><br>

        <input type="submit" value="Simpan"  class="btn btn-dark">



    </form>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
<script>
   $(".select2").select2();
</script>

{{--<script>--}}
{{--    $('#class').prop("disabled", true);--}}
{{--    $('#student').prop("disabled", true);--}}
{{--</script>--}}

{{-- # itu untuk ID, sedangkan . untuk Class --}}
<script>
    $('#jurusan').on('change', function (e) {
        console.log(e);
        var jurusan_id = e.target.value;
        $.get('{{URL::to('api/json-class')}}/'+ jurusan_id  , function (variable) {
            console.log('variable');
            $('#kelas').empty();
            $('#kelas').append('<option value="">Pilih Kelas</option>');

            $.each(variable.kelas, function (val, kelasObj) {
                $('#kelas').append('<option value="'+kelasObj->id+'">'+kelasObj.class_name+'</option>');
            });

        });
    });

    $('#kelas').on('change', function (e) {
        console.log(e);
        var kelas_id = e.target.value;
        $.get('{{URL::to('api/json-student')}}/'+ kelas_id  , function (data) {
            console.log('data');
            $('#siswa').empty();
            $('#siswa').append('<option value="">Pilih Siswa</option>');

            $.each(data.siswa, function (val, siswaObj) {
                $('#siswa').append('<option value="'+siswaObj.id+'">'+siswaObj.name_student+'</option>');
            });

        });
    });


</script>


</body>
</html>
