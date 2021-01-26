
function downloadbill(rid)
{

  $.ajax({
    url:'./api/getbilldata.php',
    type:'POST',
    data:{
      'rid':rid,
      'sid':sid
    },
    success:function(para)
    {
      
      para = JSON.parse(para)
      console.log("This is all - ",para[0])
      console.log("This is wada - ",para[0][0].mcname)
      // $('[name="updateprofile"]').attr("id", para[0].uid);
      $(".brand").html(para[0][0].mcname)
      $(".model").html(para[0][0].mmodel)
      $(".createdon").html(para[0][0].created_date)
      console.log("This is all - ",para[1])
      problems = para[1];
      s2=''
      for(let i=0;i<problems.length;i++)
      {
          if(i==problems.length-1)
          {
            s2+='<tr class="item last"><td>'+problems[i].problem+'</td><td>'+problems[i].subproblem+'</td></tr>'
          }
          else
          {
            s2+='<tr class="item"><td>'+problems[i].problem+'</td><td>'+problems[i].subproblem+'</td></tr>'
          } 
      }
      s2+='<tr class="total"><td></td><td>Total: '+para[0][0].calprice+'</td></tr>';
      $('.billcontent').append(s2)
    }
  })

  
}


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
var rid = getUrlParameter('ordidus');
downloadbill(rid)