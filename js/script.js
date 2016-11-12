$(document).ready(function(){

	var months = ["Janvier","F\u00E9vrier","Mars","Avril","Mai","Juin","Juillet","Ao\u00FBt","Septembre","Octobre","Novembre","D\u00E9cembre"];
    var date = new Date();
    var month = date.getMonth();
    var year = date.getFullYear();

    $("#year").html(year);
    $("#month1").text(months[month-1]);
	$("#month1").attr("value", month-1);

	$("#next_month").click(function(){
		
		var m1 = $("#month1").attr("value");
		m1++;
		if(m1>11){
		    m1=0;
		}

		var m2 = m1
		m2++;
		if(m2>11){
		    m2=0;
		}

		var m3 = m2
		m3++;
		if(m3>11){
		    m3=0;
		}

		var m4 = m3
		m4++;
		if(m4>11){
		    m4=0;
		}

		var m5 = m4
		m5++;
		if(m5>11){
		    m5=0;
		}

		$("#month1").text(months[m1]);
		$("#month1").attr("value", m1);
		$("#month2").text(months[m2]);
		$("#month2").attr("value", m2);
		$("#month3").text(months[m3]);
		$("#month3").attr("value", m3);
		$("#month4").text(months[m4]);
		$("#month4").attr("value", m4);
		$("#month5").text(months[m5]);
		$("#month5").attr("value", m5);

		loadData(m1, m2, m3, m4, m5);
	});

	$("#next_month").click();

	$("#prev_month").click(function(){

		var m1 = $("#month1").attr("value");
		m1--;
		if(m1<0){
		    m1=11;
		}

		var m2 = $("#month2").attr("value");
		m2--;
		if(m2<0){
		    m2=11;
		}

		var m3 = $("#month3").attr("value");
		m3--;
		if(m3<0){
		    m3=11;
		}

		var m4 = $("#month4").attr("value");
		m4--;
		if(m4<0){
		    m4=11;
		}

		var m5 = $("#month5").attr("value");
		m5--;
		if(m5<0){
		    m5=11;
		}

		$("#month1").text(months[m1]);
		$("#month1").attr("value", m1);
		$("#month2").text(months[m2]);
		$("#month2").attr("value", m2);
		$("#month3").text(months[m3]);
		$("#month3").attr("value", m3);
		$("#month4").text(months[m4]);
		$("#month4").attr("value", m4);
		$("#month5").text(months[m5]);
		$("#month5").attr("value", m5);

		loadData(m1, m2, m3, m4, m5);
	});

	$("#btn_add").click(function(){
	    
		var lastLine = $(".line:last").attr("id");
		var nextLine = parseInt(lastLine)+1;
		var lastType = $(".line:last").attr("type");

		var row = document.createElement("tr");
		$(row).attr({
			"class":"line",
			"id":""+nextLine
		});

		var col_dette=document.createElement("td");
		$(col_dette).attr({});
		var col_montant=document.createElement("td");
		$(col_montant).attr({});
		var col_solde=document.createElement("td");
		$(col_solde).attr({});

		var input_dette=document.createElement("input");
		$(input_dette).attr({
		    "type":"text"
		}) ;
		col_dette.appendChild(input_dette);

		var input_montant=document.createElement("input");   
		$(input_montant).attr({
		    "type":"text"
		}) ;

		col_montant.appendChild(input_montant);

		var input_solde=document.createElement("input");   
		$(input_solde).attr({
		    "type":"text"
		}) ;
		col_solde.appendChild(input_solde);

		row.appendChild(col_dette);
		row.appendChild(col_montant);
    	row.appendChild(col_solde);

    	document.getElementById("data").appendChild(row);

    	var lt=$(".choix:checked").val();
		$.get("/boneels/add_row.php",{lastType:lt},function(data){
			location.href="";
		});
	});

	$(".choix").click(function(){
        var value=$(this).val();
        location.href="choix.php?id="+value;    
    });

})

function loadData(m1, m2, m3, m4, m5){

	$.ajax({
	type: 'post',
	url: '/boneels/load_data.php',
	data: {
		month1:m1,
		month2:m2,
		month3:m3,
		month4:m4,
		month5:m5,
	},
	success: function (response) {
	// We get the element having id of display_info and put the response inside it
		$('#data').html(response);
	}
	});
}