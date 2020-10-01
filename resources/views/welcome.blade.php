<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Uid2Phone</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <style>
        body {
            font-family: 'Lato', sans-serif
        }

        h1 {
            margin-bottom: 40px
        }

        label {
            color: #333
        }

        .btn-send {
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            width: 80%;
            margin-left: 3px
        }

        .help-block.with-errors {
            color: #ff5050;
            margin-top: 5px
        }

        .card {
            margin-left: 10px;
            margin-right: 10px
        }

    </style>
</head>

<body>
    <div class="container mb-5">
        <div class=" text-center mt-5 ">
          <img src="favicon.png" style="width: 100px;height:100px" alt="Girl in a jacket">
            <h1 style="font-weight: bold">Uid2Phone</h1>
        </div>
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form id="contact-form" role="form" method="POST">
                                {{ csrf_field() }}
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="user_id">User ID:</label>
                                                <input type="number" name="user_id" class="form-control" id="user_id"
                                                    placeholder="Example: 01234567890">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-danger btn-send pt-2 btn-block "
                                                value="Search" name="uid_submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @isset($uid)
                                <div class="alert alert-{{ $class }} mt-3 mb-3 col-md-12" role="alert">
                                    Phone for user {{ $uid }}: {{ $phone }}
                                </div>
                            @endisset

                            <form id="contact-form" role="form" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="controls mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="user_id">Excel File:</label>
                                                <input type="file" class="form-control" name="excel_file"
                                                    id="excel_file"
                                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send pt-2 btn-block "
                                                name="excel_submit" value="Export">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.8 -->
            </div> <!-- /.row-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>
