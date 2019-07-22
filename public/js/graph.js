window.onload = function() {
	var chartUser = document.getElementById('myChartUser').getContext('2d');
	var myChartUser = new Chart(chartUser, {
		type: 'bar',
		data: {
			labels: dateUser,

			datasets: [
				{
					label: '',
					data: countUser
				}
			]
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
							min: 0,
							stepSize: 1
						}
					}
				]
			}
		}
	});
	var chartCv = document.getElementById('myChartCv').getContext('2d');
	var myChartCv = new Chart(chartCv, {
		type: 'bar',
		data: {
			labels: date,

			datasets: [
				{
					label: '',
					data: count
				}
			]
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
							min: 0,
							stepSize: 1
						}
					}
				]
			}
		}
	});
};
