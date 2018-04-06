<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        
        <script src="Scripts/d3.min.js"></script>
        <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="Scripts/jquery.tipsy.js"></script>
        <script type="text/javascript" src="Scripts/index.js"></script>
        
        <link href="Styles/tipsy.css" rel="stylesheet" type="text/css" />
        <link href="Styles/MyStyles.css" rel="stylesheet" type="text/css" />
        
        <h1>Holden2000 -Testing</h1>
        
        <?php
            echo "Hello World!";
            ?>

        <div class="inline-Block">
            <h2>Maps</h2>
            <a href="Maps/Choropleth1.html">Choropleth1</a>
            <br/><a href="Maps/scratch3.html">scratch3</a>
            <br/><a href="Maps/USMap1.html">USMap1</a>
            <br/><a href="BubbleTutorial/Bubble2.html">Bubble Chart 2</a>
            <br/><a href="BubbleTutorial/Bubble3.html">Bubble Chart 3</a>
        </div>
        <div class="inline-Block">
            <h2>Graphs</h2>
            <a href="Graphs/MultiLinePlot.html">MultiLinePlot</a>
            <br/><a href="Graphs/multiline2.html">MultiLine2</a>
            <br/><a href="Graphs/DateExample1.html">DateExample1</a>
            <br/>
            <br/>
        </div>
        <div class="inline-Block">
            <h2>D3 Excercises</h2>
            <a href="D3Exercises/ForceDrag.html">ForceDrag</a>
            <br/><a href="D3Exercises/dragrectorig.html">Original RectDrag</a>
            <br/><a href="D3Exercises/RectDrag1.html">RectDrag1</a>
            <br/><a href="D3Exercises/scratch2.html">scratch2</a>
        </div>
        <div class="inline-Block">
            <h2>Etc.</h2>
            <a href="index.jsp">Original Home page</a>
            <br/><a href="index.html">Home Page</a>
            <br/><a href="http://107.22.75.28">Holden2000 Blog</a>
            <br/>
            <br/>
            <br/>
        </div>
        
    </head>
    
    <body>
        
        <br/>
        <br/>
        <hr/>
        <div id="chart"></div>
        
        <!--<div id="tooltipx"></div> div to hold tooltip. -->
        
        <script type="text/javascript">
            
            var w = 1200, h = 600;
            var colors = d3.scale.category20();
            
            var tooltipNew = function tooltipHtml(d){    /* function to create html content string in tooltip div. */
                return "<b>YOW!</b><table>"+
                "<tr><td>X = </td><td>"+(d.x)+"</td></tr>"+
                "<tr><td>Y = </td><td>"+(d.y)+"</td></tr>"+
                "<tr><td>I = </td><td>"+(d.i)+"</td></tr>"+
                "</table>";
            }
        
        
        var vis = d3.select("#chart").append("svg:svg")
        .attr("width", w)
        .attr("height", h)
        
        var CircleData = d3.range(50).map(function(i) {
                                    return { i:i, x:(Math.random()*w).toFixed(1), y:(Math.random()*h).toFixed(0), r:(Math.random()*30)+5 }
                                    });
                                    
                                    
            var tooltip = d3.select("body")
            .append("div")
            .attr("class", "tooltipStyle")
            .style("position", "absolute")
            .style("z-index", "10")
            .style("visibility", "hidden");
            
            
            
            vis.selectAll("circle")
            .data(CircleData).enter().append("svg:circle")
            .attr("stroke", "black")
            .attr("fill", function(d) { return colors((d.r/3).toFixed(1) + 1); })    //color by radius
            //.attr("fill", function(d, i) { return colors(i); })
            .attr("cx", function(d) { return d.x; })
            .attr("cy", function(d) { return d.y; })
            .attr("r", function(d) { return d.r; })
            .on("mouseover", function(d){return (tooltip.style("visibility", "visible"), tooltip.html(tooltipNew(d)));})
            .on("mousemove", function(){return tooltip.style("top",
                                                             (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px");})
                                                             .on("mouseout", function(){return tooltip.style("visibility", "hidden");});
                                                             
                                                             
                                                             
             //puts i in center of circle
             vis.selectAll("text")
             .data(CircleData).enter().append("text")
             .attr("x", function(d) { return d.x; })
             .attr("y", function(d) { return d.y; })
             .attr("dy", ".35em")
             .text( function(d) {return d.i;})
             .attr("font-family", "sans-serif")
             .attr("font-size", "10px")
             .attr("fill", "black");
                                                                                     
                                                                                     
            </script>
        
    </body>
</html>

