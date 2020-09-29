<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Uid2Phone</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-12">
            <form method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="user_id">User ID:</label>
                <input type="number" name="user_id" value="@isset($uid) {{ $uid }} @endisset" class="form-control" id="user_id" placeholder="Example: 01234567890">
                </div>
                <button type="submit" name="uid_submit" class="btn btn-info col-3">Search</button>
            </form>

            @isset($uid)
            <br/>
            <div class="alert alert-{{ $class }}" role="alert">
                Phone for user {{ $uid }}: {{ $phone }}
            </div>
            @endisset
            <br/>

            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="user_id">Excel File:</label>
                  <input type="file" class="form-control" name="excel_file" id="excel_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                </div>
                <button type="submit" name="excel_submit" class="btn btn-success col-3">Export</button>
            </form>
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>