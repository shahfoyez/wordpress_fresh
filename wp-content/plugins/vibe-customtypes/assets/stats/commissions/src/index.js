import Chart from 'chart.js';

const { createElement, render, useState,useEffect,Fragment} = wp.element;

const CommissionStats = (props) =>{


	const [isLoading,setisLoading] = useState(true);
	const [stats,setStats] = useState({earnings:0,commissions:0,payouts:0,currencies:[],commission_chart:[],payout_chart:[],records:[]});
	const [message,setMessage] = useState('');
	const [args,setArgs] = useState({start_date:'',end_date:'',currency:''});
	const [chartRef,setChartRef] = useState(0);
	const [selectedCur,setSelectedCur] = useState('');
	const [currentChart,setCurrentChart] = useState({});
	useEffect(()=>{

		fetch(`${window.commissions.api_url}`,{
		    method: 'post', 
		    body: JSON.stringify(args)
	  	}).then((res)=>res.json())
		.then((result)=>{
			setisLoading(false);
			if(result.status){
				let nstats = {...stats};
				nstats.earnings = result.data.earnings;
				nstats.commissions = result.data.commissions;
				nstats.payouts = result.data.payouts;
				nstats.currencies = result.data.currencies;
				nstats.commission_chart = result.data.commission_chart;
				nstats.payout_chart = result.data.instructor_payout_chart;
				nstats.records = result.data.instructor_data;
				if(Object.keys(currentChart).length !== 0){
					currentChart.destroy();
					setCurrentChart({});
				}
				
				setStats(nstats);
				
			}else{
				setMessage(result.message);
			}
		});

	},[args]);

	useEffect(()=>{
		if(chartRef){
			let commissionCdata = [];
			let payoutPdata = [];
			let cstats = {...stats};
			let commission_chart = cstats.commission_chart;
			var datas = [];
	        var xaxis ={};
	        commission_chart.map(function (cdata,index) {
	        	xaxis[cdata.z] = String(cdata.x);
	        	datas[index] = {x : cdata.z, y : cdata.y};

	        });
	        if(datas[0]){
	            commissionCdata = Object.values(datas);
        	}

			let payout_chart = cstats.payout_chart;
			var pdatas = [];
	        payout_chart.map(function (pdata,index) {
	        	xaxis[pdata.z] = String(pdata.x);
	        	pdatas[index] = {x : pdata.z, y : pdata.y};

	        });
	        if(pdatas[0]){
	            payoutPdata = Object.values(pdatas);
        	}
        	
			let scatterChart = new Chart(chartRef, {
			    type: 'scatter',
			    data: {
				    datasets: [
				    	{
					        label: window.commissions.translations.commissions,
					        data: commissionCdata,
					        showLine: true,
					        fill: false,
					        borderColor: 'rgba(0, 200, 0, 1)'
				    	},
				      	{
					        label: window.commissions.translations.payouts,
					        data: payoutPdata,
					        showLine: true,
					        fill: false,
					        borderColor: 'rgba(200, 0, 0, 1)'
				    	}
				    ]
				},
				options: {
					maintainAspectRatio: true,
					tooltips: {
					  mode: 'index',
					  intersect: false,
					},
					hover: {
					  mode: 'nearest',
					  intersect: true
					},
					scales: {
						yAxes: [{
							
							ticks: {
								beginAtZero:true,
								autoSkip: false,
							}
						}],
						xAxes: [{
							
							ticks: {
								userCallback: function(label, index, labels) {
									return xaxis[label];
								},
								autoSkip: false,
								stepSize: 1,
							}
						}]
					},
				}
			});
			setCurrentChart(scatterChart);
		}
	},[stats]);

	return (
		
		<div id="poststuff" className="vibe-reports-wrap">
		{
			isLoading?<div className="loader">Loading...</div>
			:
				message.length?
					<div className="message">{message}</div>
				:
					<Fragment>
						<div className="vibe-reports-sidebar">
							<div className="postbox">
								<h3><span>{window.commissions.translations.total_earnings}</span></h3>
								<div className="inside">
									<p className="stat">{stats.earnings}</p>
								</div>
							</div>
							<div className="postbox">
								<h3><span>{window.commissions.translations.total_commissions}</span></h3>
								<div className="inside">
									<p className="stat">{stats.commissions}</p>
								</div>
							</div>
							<div className="postbox">
								<h3><span>{window.commissions.translations.total_payouts}</span></h3>
								<div className="inside">
									<p className="stat">{stats.payouts}</p>
								</div>
							</div>
						</div>
						<div className="vibe-reports-main">
							<div className="report_head">
								<input type="date" onChange={(e)=>{ setArgs({...args,start_date:e.target.value});}} value={args.start_date} />
								<input type="date" onChange={(e)=>{ setArgs({...args,end_date:e.target.value});}} value={args.end_date} />

								<select onChange={(e)=>{ setArgs({...args,currency:e.target.value});}} value={args.currency} >
                                    {
                                        stats.currencies.map((currency)=>{
                                            return (<option value={currency} key={currency} >{currency}</option>)
                                        })
                                    }
                                </select>
							</div>
							<div className="postbox info_chart">
								{
									(currentChart)?
									<canvas id="myChart" ref={ref => setChartRef(ref)}></canvas>
									:''
								}
							</div>
							<div className="postbox info_table">
								 <div className="record recordHeader"><strong>{window.commissions.translations.instructor}</strong><strong>{window.commissions.translations.commissions}</strong><strong>{window.commissions.translations.payouts}</strong></div>
								{
                                    (stats.records.length)?

						            stats.records.map((record,index)=>{
						            	return (

						                    <div className="record" key={index}>
						                        
						                        <div>
						                            <div className="instructor">
						                                <span>{record.instructor}</span>
						                            </div>
						                        </div>
						                        
						                        <div>
						                            <div className="instructor_commission commissions">
						                                <span>{record.commission} </span>
						                            </div>
						                        </div>
						                        
						                        <div>
						                            <div className="instructor_commission payouts">
						                                <span>{record.payout} </span>
						                            </div>
						                        </div>

						                    </div>
					                    )
						            })        
						                     
						        :
						            <div className="nocommissionrecords">
							            <div className="message">
							                {window.commissions.translations.no_records}
						                </div>
					                </div>
						            						        }
							</div>
						</div>
					</Fragment>
		}
			
		</div>
	)
}

export default CommissionStats;

render( <CommissionStats /> ,
   document.querySelector("#wplms_commission_stats")
);