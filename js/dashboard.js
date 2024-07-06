$(document).ready(function(){
	//Line Chart
	$.ajax({
		url: "data.php",
		method: "GET",
		success: function(data) {
			var count = [];
			var year = [];
			var yr_grad = data['year_graduated'];
			var max_ticks = 0;

			for(var i = 0, length=yr_grad.length; i < length; i++) {
				count.push(yr_grad[i].number_of_graduates);
				max_ticks += parseInt(yr_grad[i].number_of_graduates);
				year.push(yr_grad[i].year_graduated);
			}

			var chartdata = {
				labels: year,
				datasets : [
					{
						label: 'Number of Graduates',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: count
					}
				]
			};

			var ctx = $("#myChart");

			var lineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options: {
					title: {
			            display: true,
			            text: 'Number of Graduates every year'
			        },
				    scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero: true,
				                max: max_ticks
				            }
				        }]     
				    }
				}
			});
		},
		error: function(data) {
			
		}
	});
	// BAR CHART
	$.ajax({
		url: "data.php",
		method: "GET",
		success: function(data) {
			var yes = [];
			var no = [];
			var count = [];
			var jb_related = data['job_related'];
			var max_ticks = 0;
			
			for(var i = 0, length=jb_related.length; i < length; i++) {
				if(jb_related[i].job_related == "No") {
					no.push(jb_related[i].num_of_job_related);
				} else if(jb_related[i].num_of_job_related) {
					yes.push(jb_related[i].num_of_job_related);
				}
				count.push(jb_related[i].num_of_job_related);
			}
			max_ticks = Math.max(no) + Math.max(yes);


			var chartdata = {
				labels: ["Not Related","Related"],
				datasets : [
					{
						label: "number of answers",
						backgroundColor: [
			                'rgba(255, 99, 132, 0.5)',
			                'rgba(54, 162, 235, 0.5)'
			            ],
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)'
			            ],
						hoverBorderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)'
			            ],
						data: count
					}
				],

			};

			var ctx = $("#myChart2");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					title: {
			            display: true,
			            text: 'Number of Graduates w/ jobs related to their courses'
			        },
				    scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero: true,
				                max: max_ticks
				            }
				        }]     
				    }
				}
			});
		},
		error: function(data) {
		
		}
	});
	// BAR CHART 2
	$.ajax({
		url: "data.php",
		method: "GET",
		success: function(data) {
			var age = [];
			var status_yes = [];
			var status_no = [];
			var status_yes2 = [];
			var status_no2 = [];
			var status_yes3 = [];
			var status_no3 = [];
			var count_yes = [];
			var count_no = [];
			var age_data = data['age'];
			var max_ticks = 0;
			
			for(var i = 0, length=age_data.length; i < length; i++) {
				if(age_data[i].age >= 20 && age_data[i].age <= 22) {
					if( age_data[i].emp_status == "No" ){
						status_no.push(age_data[i].emp_status);
					} else if( age_data[i].emp_status == "Yes" ) {
						status_yes.push(age_data[i].emp_status);
					}
				} else if(age_data[i].age >= 23 && age_data[i].age <= 26) {
					if( age_data[i].emp_status == "No" ){
						status_no2.push(age_data[i].emp_status);
					} else if( age_data[i].emp_status == "Yes" ) {
						status_yes2.push(age_data[i].emp_status);
					}
				} else if(age_data[i].age >=27 && age_data[i].age <= 29) {
					if( age_data[i].emp_status == "No" ){
						status_no3.push(age_data[i].emp_status);
					} else if( age_data[i].emp_status == "Yes" ) {
						status_yes3.push(age_data[i].emp_status);
					}
				}
			}
			age.push("age: 20-22");
			age.push("age: 23-26");
			age.push("age: 27-29");

			count_no.push("" + status_no.length + "");
			count_yes.push("" + status_yes.length + "");
			count_no.push("" + status_no2.length + "");
			count_yes.push("" + status_yes2.length + "");
			count_no.push("" + status_no3.length + "");
			count_yes.push("" + status_yes3.length + "");
			
			max_ticks = Math.max(parseInt(count_yes)) + Math.max(parseInt(count_no));

			var chartdata = {
				labels: age,
				datasets : [
					{
						label: "No",
						backgroundColor: 'rgba(255, 99, 132, 0.5)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(255, 99, 132, 1)',
						hoverBorderColor: 'rgba(255, 99, 132, 1)', 
						data: count_no
					},
					{
						label: "Yes",
						backgroundColor: 'rgba(54, 162, 235, 0.5)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(54, 162, 235, 1)',
						hoverBorderColor: 'rgba(54, 162, 235, 1)',
						data: count_yes
					}
				],

			};

			var ctx = $("#myChart3");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					title: {
			            display: true,
			            text: 'Number of Graduates that are employed by age range'
			        },
				    scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero: true,
				                max: max_ticks
				            }
				        }]     
				    }
				}
			});
		},
		error: function(data) {
		
		}
	});
	//Pie Chart
	$.ajax({
		url: "data.php",
		method: "GET",
		success: function(data) {
			var count = [];
			var evaluation = [];
			var eval_data = data['evaluated'];
			var max_ticks = 0;

			for(var i = 0, length=eval_data.length; i < length; i++) {
				count.push(eval_data[i].num_of_evaluated);
				evaluation.push(eval_data[i].evaluation);
			}

			var chartdata = {
				labels: evaluation,
				datasets : [
					{
						label: evaluation,
						backgroundColor: [
							"rgba(62, 149, 205, 0.5)", 
							"rgba(142, 94, 162, 0.5)",
							"rgba(60, 186, 159, 0.5)"
						],
						hoverBackgroundColor: [
							"rgba(62, 149, 205, 1)", 
							"rgba(142, 94, 162, 1)",
							"rgba(60, 186, 159, 1)"
						],
						data: count
					}
				]
			};

			var ctx = $("#myChart4");

			var lineGraph = new Chart(ctx, {
				type: 'pie',
				data: chartdata,
				options: {
					title: {
			            display: true,
			            text: 'Evaluation of Alumni on ther jobs'
			        },
				}
			});
		},
		error: function(data) {
			
		}
	});
});