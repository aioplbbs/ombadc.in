<?php if (basename($_SERVER['SCRIPT_FILENAME']) == 'script.php') { die ('<h2>Direct File Access NOT allowed</h2>'); }  ?>


<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
  <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
  <!-- Popper JS -->
  <script src="assets/js/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Plugins JS -->
  <script src="assets/js/plugins.js"></script>
  <!-- Ajax Mail -->
  <script src="assets/js/ajax-mail.js"></script>
  <script>
   new WOW().init();
$('.reset').click(function(){
  new WOW().init();
})
    </script>
  <!-- Main JS -->
  <script src="assets/js/main.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script type="text/javascript" src="assets/js/mdb.min.js"></script>
      <div class="d-none">
      <script type="text/javascript" src="assets/js/mdbFsscroller.min.js"></script>
    </div> -->

	

    <script>
		// number animate when it aper in view port
       $(document).ready(function() {
    const options = {
      root: null, // Use the viewport as the root
      rootMargin: '0px',
      threshold: 0.1, // When 10% of the element is in the viewport
    };
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
			
          const $element = $(entry.target);
          const finalValue = parseFloat($element.data('final-value'));
          const duration = 3000; // 3 seconds
          const steps = 120; // Number of animation steps
          const stepValue = finalValue / steps;
          let currentValue = 0;
          const stepDuration = duration / steps;

          function animateValue() {
            if (currentValue < finalValue) {
              currentValue += stepValue;
              $element.text(Math.round(currentValue));
              setTimeout(animateValue, stepDuration);
            } else {
              $element.text(finalValue);
            }
          }

          animateValue();
          observer.unobserve(entry.target); // Stop observing once animation starts
        }
      });
    }, options);

    $('.animate').each(function() {
      observer.observe(this);
    });
  });
    </script>



<script>
$('.owl-carousel').owlCarousel({
  loop: false,
  margin: 10,
  nav: true,
  responsive: {
	0: {
	  items: 1
	},
	600: {
	  items: 1
	},
	1000: {
	  items: 3
	}
  }
})
</script>










<script type="text/javascript" src="assets/js/chartsloader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
			
          ['Sector', 'Sanctioned'],
          @foreach()
		  <?php
		$sql="SELECT * from ".SERVICE." where Status='1' order by Odr asc";
		$res=$db->getData($sql);
		$nos=$res['NO_OF_ITEMS'];
		for($i=0;$i<$nos;$i++) {
		$ids=outText($res['oDATA'][$i]['ID']); 
		$ServiceName=outText($res['oDATA'][$i]['Name']);
		$ServiceSanctioned=outText($res['oDATA'][$i]['Sanctioned']);
		?>  
          ['<?=$ServiceName?>',     <?=$ServiceSanctioned?>]<?php if($i<($nos-1)) { ?> ,<?php } ?>
		  <?php } ?>
        ]);

        var options = {
        //   title: 'My Daily Activities',
          is3D: true,
		  backgroundColor: 'transparent',
		 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechats'));
        chart.draw(data, options);
      }


	  
    </script>

<script type="text/javascript">


   
  
  
    // <div id="piechart_3d" style="width: 900px; height: 500px;"></div>





$(function () {
		$('#piechat').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,

			},
			// title: {
			//   text: 'Sector wise Fund Allocation'
			// },
			title:false,
			tooltip: {
			  pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
			  percentageDecimals: 1
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						color: '#000000',
						connectorColor: '#000000',
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: ₹ '+ this.point.y +' Cr.';
						}
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Amount in ',
				data: [
					<?php
		$sql="SELECT * from ".SERVICE." where Status='1' order by Odr asc";
		$res=$db->getData($sql);
		$nos=$res['NO_OF_ITEMS'];
		for($i=0;$i<$nos;$i++) {
		$ids=outText($res['oDATA'][$i]['ID']); 
		$ServiceName=outText($res['oDATA'][$i]['Name']);
		$ServiceSanctioned=outText($res['oDATA'][$i]['Sanctioned']);
		?>  
          ['<?=$ServiceName?>', <?=$ServiceSanctioned?>]<?php if($i<($nos-1)) { ?> ,<?php } ?>
		  <?php } ?>
				]
			}]
		});


		$('#barchat').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: 'Departmentwise Projects Status'
		},
		subtitle: {
			text: ''
		},
	 
		xAxis: {
			categories: [
				'Agriculture and<br>Farmers Empowerment',
				'Department Of<br>Higher Education',
				'Department of Sports<br>and Youth Services',
				'School and Mass<br>Education',
				'Skill Development &<br>Technical Education',
				'ST & SC <br>Development'
			],
			labels: {
				rotation: -55,
				align: 'right',
				style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Amount in Crore'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Sanctioned Amount',
			data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5]

		}, {
			name: 'Released Amount',
			data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3]

		}, {
			name: 'Utilizd Amount',
			data: [42.4, 33.2, 34.5, 39.7, 42.6, 45.5]

		}]
	});
	});
	

	</script>
<script src="assets/js/charts.js?v2"></script>
<script src="assets/js/exporting.js"></script>
<script>
$(document).scroll(function() {
	if ( $(this).scrollTop() > 10 ) {
		$('.sml-logo').show('slow');
  $('.logo-main').addClass('logo-white-bg');
		$('.new-logo').hide('slow');
	} else {
		$('.sml-logo').hide('slow');
  $('.logo-main').removeClass('logo-white-bg');
		$('.new-logo').show('slow');
	}
	if ( $(this).scrollTop() > 100 ) {
		$('.scroll-news').hide('slow');
	} else {
		$('.scroll-news').show('slow');
	}
}); 
</script>