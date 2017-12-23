/* Load Page */

function load(page,div){
    var loading_image_large = site+'public/images/loading_large.gif' ;
    var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";

    $.ajax({
        url: site+"/"+page,
        dataType:"html",
        beforeSend: function(){
            $(div).html(image_load);
        },
        success: function(response){
            $(div).html(response);
        },
        error:function (xhr, ajaxOptions, thrownError){
            var msg = "Sorry but <b>"+ page +"</b> was an error: "+ xhr.status ;
//            var pesan = msg + xhr.status + " /" + xhr.statusText + "  " + xhr.responseText
            $(div).html(msg);
        }
    });
    return false;
}

// function active_menu(obj)
// {
// 	$(".acemn").attr("class", "acemn");
// 	var c = obj.split('>');
// 	var n = 0;
// 	c.forEach(function(entry) {
// 			if (n>0){
// 				$(c[n]).attr("class", "acemn active open");
// 				$(c[0]).attr("class", "acemn active");
// 			}else{
// 				$(c[n]).attr("class", "acemn active");
// 			}
// 		n++;
// 	});
//
// }

function formatNumber(input)
{
    var num = input.value.replace(/\,/g,'');
    if(!isNaN(num)){
    if(num.indexOf('.') > -1){
    num = num.split('.');
    num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
    if(num[1].length > 2){
    alert('You may only enter two decimals!');
    num[1] = num[1].substring(0,num[1].length-1);
    } input.value = num[0]+'.'+num[1];
    } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };
    }
    else{ alert('Anda hanya diperbolehkan memasukkan angka!');
    input.value = input.value.substring(0,input.value.length-1);
    }
}

function getparameter(url,posdata,hendel){
  $.ajax({
    type: "POST",
    dataType: "json",
    url: url, //Relative or absolute path to response.php file
    data: posdata,
    success: function(data){
      hendel(data);
    },
  });
}

function saveGrid(prm){
var posdata = $("#form-1").serialize();
//  alert(JSON.stringify(postData));

//alert (JSON.stringify(postData1));
$.ajax({
  type: "POST",
  dataType: "json",
  url: prm.url, //Relative or absolute path to response.php file
  data: posdata,
  beforeSend:function(){
      var newHTML = '<i class="ace-icon fa fa-spinner fa-spin "></i>Loading...';
      $('#save').html(newHTML);

      // ubah save jadi loding
//      alert(JSON.stringify($('#save')));
  },
  success: function(msg){

    var newHTML = '<i class="ace-icon fa fa-floppy-o"></i>Save';
    $('#save').html(newHTML);

    if(msg.status == "success"){
      $(prm.grid).trigger("reloadGrid");
      $(prm.modal).modal('hide');
      $('#form-1').trigger("reset");

    } else {
      alert (msg.msg);
    }
  },
  error: function(xhr, Status, err) {
      //alert("Terjadi error : "+Status);
      alert (JSON.stringify(xhr));
      alert ("terjadi kesalahan harap hubungi administrator");
  }
});
  // $.ajax({
  //   type: 'POST',
  //   url: '/api/bank/save',
  //   data: postData,
  //   beforeSend:function(){
  //       var newHTML = '<i class="ace-icon fa fa-spinner fa-spin "></i>Loading...';
  //       document.getElementById('save').innerHTML = newHTML;
  //   },
  //   success: function(msg) {
  //
  //     var newHTML = '<i class="ace-icon fa fa-floppy-o"></i>Save';
  //     document.getElementById('save').innerHTML = newHTML;
  //
  //     if(msg.status == "success"){
  //       $(grid_selector).trigger("reloadGrid");
  //       $('#my-modal').modal('hide');
  //       document.getElementById("form-1").reset()
  //
  //     } else {
  //       alert (msg.msg);
  //     }
  //
  //   },
  //   error: function(xhr, Status, err) {
  //     //alert("Terjadi error : "+Status);
  //     alert (JSON.stringify(xhr));
  //     alert ("terjadi kesalahan harap hubungi administrator");
  //   }
  // });
}
