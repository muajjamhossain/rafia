<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Contact Us Information</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <style>
          *{
            margin: 0px;
            padding: 0px;
            outline: 0px;
          }

          .wrapper{
            width: 100%;
            padding: 20px 40px;
          }

          h2.title{
            text-align: center;
            font-family: sans-serif;
            font-size: 20px;
            line-height: 30px;
          }

          .custom_view_table{
              margin-top: 20px;
          }

          .custom_view_table tr{

          }

          .custom_view_table tr td:first-child{
              font-weight: bold;
              text-align: right;
              width: 28%;
          }

          .custom_view_table tr td:last-child{
              font-weight: normal;
              text-align: left;
              width: 70%;
          }
      </style>
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped table-hover custom_view_table">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$data->conus_name}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{$data->conus_phone}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$data->conus_email}}</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td>{{$data->conus_sub}}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>:</td>
                        <td>{{$data->conus_mess}}</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>:</td>
                        <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>
