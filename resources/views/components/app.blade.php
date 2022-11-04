<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    {{-- <link href="{{ url('css/fontawesome.min.css') }}" rel="stylesheet"> --}}
    <!-- datatable -->
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
    <script src="{{ url('js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ url('js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.5/dist/latest/bootstrap-autocomplete.min.js">
    </script>
</head>
<style type="text/css">

</style>

<body>
    @yield('content')

    <script>
        function isEmptyM(obj) {
            for (var key in obj) {
                if (obj.hasOwnProperty(key))
                    return false;
            }
            return true;
        }

        function alertSimpan(form, text = null) {
            var txt = "";
            if (text) {
                txt = text;
            }
            swal({
                title: "Apakah anda yakin?",
                text: txt,
                icon: "info",
                buttons: ["Batal", "OK"],
            }).then((willDelete) => {
                if (willDelete) {
                    $(form).submit();
                } else {
                    return false;
                }
            });
        }

        function AlertData() {
            swal({
                title: "Data Tidak Lengkap !",
                text: "Silahkan lengkapi data terlebih dahulu !",
                icon: "warning",
            });
        }

        function AlertDataSatuan(data) {
            swal({
                icon: 'warning',
                text: 'Silahkan Isi ' + data + ' Terlebih Dahulu !',
                button: false,
                timer: 1500
            });
        }

        function notif(type, msg) {
            swal({
                icon: type,
                text: msg,
                button: false,
                timer: 1500
            });
        }
    </script>
</body>

</html>
