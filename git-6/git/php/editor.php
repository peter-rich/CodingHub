<?php
function edit_content($content,$project_id){
	echo'

<h1>CodingHub Editor</h1>



<div id="tabPlugin" class="tabPlugin">
    <ul id="tabControls">
        <li onclick="Tiny.tab(1)">Edit</li>
    </ul>
    <a class="save button" onclick="Tiny.save(';
	echo $project_id;
	echo')">Save</a>
    <a class="full button" onclick="Tiny.fullScreen()">Full-Screen</a>
    <select name="" id="theme"></select>

    <div class="tabContainer">
       <pre id=\'html\' style="font-size: 16px;">';
	echo $content;
	echo'
        </pre>
    </div>

    <div class="tabContainer">
        <pre id= \'css\' style="font-size: 16px;">
h1{
    color:red;
}
        </pre>
    </div>


    <div class="tabContainer">
        <pre id=\'js\' style="font-size: 16px;">

document.getElementsByTagName(\'h1\')[0].innerHTML=\'Hello World!\'

        </pre>

    </div>
    <div class="tabContainer" id="dockIframe">
        <div class="split-line" id="splitLine"></div>
        <iframe class="iframe" id="iframe" sandbox="allow-forms allow-popups allow-scripts allow-same-origin allow-modals" name="iframe" frameborder="0">
        </iframe>
    </div>
</div>




<script src="http://cdn.bootcss.com/ace/1.2.3/ace.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="Tiny-editor2.js"></script>
<script>
    var Tiny = new TinyEditor(\'Tiny-container\',{
        index : 2
    })
</script>

';
}
?>