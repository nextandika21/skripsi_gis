@extends('layouts.client')

@section('content')
    <div class="container text-center">
        <h4><b>MAP INFORMASI MADRASAH</b></h4>
    </div>
    <div style="margin-top:20px;">
    <div id="map" style="width:100%;height:500px;"></div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w&callback=initMap&libraries=&v=weekly&channel=2"
      async
    ></script>

<script type="text/javascript">
    function initMap() {
        const myLatLng = { lat: -6.178306, lng: 106.631889 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: myLatLng,
        });

        $.ajax({
            url: "/api/madrasah",
            success: function(data){
                var markers=[];
                var contents = [];
                var infowindows = [];
                for(var i=0;i<=data.length-1;i++){
                    var nama_madrasah = data[i].nama_madrasah;
                    var jenis_madrasah = data[i].jenis_madrasah;
                    var alamat = data[i].alamat;
                    var akreditasi = data[i].akreditasi;
                    var npsn = data[i].npsn;
                    var photo = data[i].photo;
                    var latlong = {lat: parseFloat(data[i].latitude), lng : parseFloat(data[i].longitude)};
                    const iconBase =
                    "storage/map/marker.png";
                    
                    contents[i] =
                        '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 id="firstHeading" class="firstHeading">'+nama_madrasah+'</h1>' +
                        '<div id="bodyContent">' +
                        "<p><b>Jenis Madrasah :</b> "+jenis_madrasah+"</p>"+
                        "<p><b>Alamat :</b> "+alamat+"</p>"+
                        "<p><b>Akreditasi :</b> "+akreditasi+"</p>"+
                        "<p><b>NPSN :</b> "+npsn+"</p>" +
                        '<img src="'+photo+'" >';

                    infowindows[i] = new google.maps.InfoWindow({
                        content: contents[i],
                    });

                    markers[i] = new google.maps.Marker({
                        position: latlong,
                        icon: iconBase,
                        map,
                        title: nama_madrasah
                    });

                    markers[i].index = i;

                    google.maps.event.addListener(markers[i], 'click', function() {
                        infowindows[this.index].open(map,markers[this.index]);
                    });
                }
            }
        });
    }
</script>
    
@endsection