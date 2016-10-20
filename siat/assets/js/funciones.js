  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainerSpline",
    {      
      title:{
        text: ""
      },
      axisY :{
        includeZero: false
      },
      toolTip: {
        shared: "true"
      },
      data: [
      {        
        type: "spline", 
        showInLegend: true,
        name: "mentions of iPhone",
        markerSize: 0,        
        dataPoints: [
        {x: new Date(2013,4,1 ), y: 430576},
        {x: new Date(2013,4,2 ), y: 498157},      
        {x: new Date(2013,4,3 ), y: 415128},      
        {x: new Date(2013,4,4 ), y: 342031},      
        {x: new Date(2013,4,5 ), y: 320376},      
        {x: new Date(2013,4,6 ), y: 405322},      
        {x: new Date(2013,4,7 ), y: 433426},      
        {x: new Date(2013,4,8 ), y: 430876},      
        {x: new Date(2013,4,09 ), y: 372277},      
        {x: new Date(2013,4,10 ), y: 351863},      
        {x: new Date(2013,4,11 ), y: 281959},      
        {x: new Date(2013,4,12 ), y: 282666},      
        {x: new Date(2013,4,13 ), y: 353718},      
        {x: new Date(2013,4,14 ), y: 507833}    
        ]
      },
      {        
        type: "spline", 
        showInLegend: true,
        name: "mentions of samsung",
        markerSize: 0,        
        dataPoints: [
        {x: new Date(2013,4,1 ), y: 110386},
        {x: new Date(2013,4,2 ), y: 110330},      
        {x: new Date(2013,4,3 ), y: 108025},      
        {x: new Date(2013,4,4 ), y: 59493},      
        {x: new Date(2013,4,5 ), y: 66765},      
        {x: new Date(2013,4,6 ), y: 102950},      
        {x: new Date(2013,4,7 ), y: 89233},      
        {x: new Date(2013,4,8 ), y: 89133},      
        {x: new Date(2013,4,09 ), y: 86751},      
        {x: new Date(2013,4,10 ), y: 58672},      
        {x: new Date(2013,4,11 ), y: 43560},      
        {x: new Date(2013,4,12 ), y: 87404},      
        {x: new Date(2013,4,13 ), y: 202324},      
        {x: new Date(2013,4,14 ), y: 208084}    
        ]
      }      
      ]
    });

chart.render();

var chart = new CanvasJS.Chart("chartContainerTorta",
    {
      title:{
        text: ""
      },
      theme: "theme2",
      data: [
      {        
        type: "doughnut",
        indexLabelFontFamily: "Garamond",       
        indexLabelFontSize: 20,
        startAngle:0,
        indexLabelFontColor: "dimgrey",       
        indexLabelLineColor: "darkgrey", 
        toolTipContent: "{y} %",          

        dataPoints: [
        {  y: 37.34, label: "{y}%" },
        {  y: 28.6, label: "{y}%" },
        {  y: 21.78, label: "{y}%" }

        ]
      }
      ]
    });

    chart.render();
  }
