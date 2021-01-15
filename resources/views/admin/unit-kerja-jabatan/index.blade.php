<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buka IKU</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <link href="{{asset('nalpure/layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>
<body id="top">

<div class="wrapper row1">
        <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace">
      <li> Universitas Jambi</li>
      <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
  </div>
</div>
  <header id="header" class="hoc clear center">

      <!-- ################################################################################################ -->
      <div>
        <h1 id="logo">Indikator Kinerja Unit Universitas Jambi</h1>
      </div>
      <div class="alert alert-info" >
        <div class="col-md-2" style="margin-bottom: 10px;">
<select id="tahun" name="tahun" class="form-control">
            <option value="2021">2021</option>
            <option selected="" value="2020">2020</option>
            <option value="2019">2019</option>
</select>
    <strong></strong>
</div>
   
      <div class="table-responsive">
 <table id="data_users_reguler" class="display" style="width:100%">
        <thead>
            <tr>
                  <th>No</th>
                  <th>Jabatan Unit Kerja</th>
                  <th>Nilai IKU</th>
                  <th>Peringkat</th>
                </tr>
              </thead>
              <tbody>
                @forelse($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->jabatan->nama_jabatan.' '.$d->unit_kerja->ref_unit->nama_di_plo}}</td>
                  <td>0</td>
                  <td>0</td>
                </tr>
                @empty
                @endforelse
              </tbody>
        </thead>
      </table>
    </div>
        
            
    </table>
    <script>
    $(document).ready(function() {
    $('#data_users_reguler').DataTable();
} );
</script>

<script src="{{asset('nalpure/layout/scripts/jquery.backtotop.js')}}"></script>
<script src="{{asset('nalpure/layout/scripts/jquery.mobilemenu.js')}}"></script>
</body>
</html>