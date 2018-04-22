

function sortPrices(priceSpans) {
	var prices =[];	
    var priceSpans = document.getElementsByName('price')
    var minIndex;
	var skip = false;
	var indexes = [];
	for(var i = 0; i < priceSpans.length; i++){
 		prices[i] = priceSpans[i].innerHTML;
		prices[i] = prices[i].replace("$","");
	}
	var min;
	var max = Math.max(...prices);
	
	for(var j = 0; j <prices.length; j++){
			minIndex = 0;
			min = max;
		for(i = 0; i < prices.length; i++){
			skip = false;
            for(x = 0; x < indexes.length; x++) {
               if(i == indexes[x]){
                   skip = true;
                }
            }
            if(prices[i] < min && !skip)
			{
                min = prices[i];  
                minIndex = i;
            }
        }
		indexes[j] = minIndex;
    }
	return indexes;
};

function reorder() {
    console.log("reorder");
    var priceSpans = document.getElementsByName('price');
    var indexes = sortPrices(priceSpans);
    var index;
    var divs = []
    for(var i = 0; i < priceSpans.length; i++) {
        divs[i] = priceSpans[i].parentNode.parentNode.parentNode.parentNode;
    }

    var temp;

    for(var i = 0; i < priceSpans.length; i++) {
        index = indexes.indexOf(i);
        console.log(" index = " + index + " i = " + i + " divs[index] price = " + priceSpans[index].innerHTML +" divs[i] price = " +priceSpans[i].innerHTML);
        console.log(divs.toString());
        if(index != i) 
        {
        temp = divs[index].nextSibling;
        divs[i].parentNode.insertBefore(divs[index], divs[i]);
        divs[i].parentNode.insertBefore(divs[i],temp);
        }
    }   
};

    