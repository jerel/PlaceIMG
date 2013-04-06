
## PyroCMS PlaceIMG Plugin

Example:

    // will return a 640px X 480px image
    {{ place:img }}

Full Example:

    {{ place:img 
    	width="1000" 
    	height="800" 
    	category="people|tech|nature" 
    	// you may apply a filter of either sepia or grayscale
    	filter="sepia"
    	alt="header" 
    	title="Hello"
    	// you can pass additional attributes
    	data-id="foo"
    	style="border:1px solid #163755"
    }}

Output:

    <img src="http://placeimg.com/1000/800/tech/sepia" title="Hello" data-id="foo" style.../>

#### Legal

* Author  -- [Jerel Unruh](http://jerel.co)
* License -- MIT