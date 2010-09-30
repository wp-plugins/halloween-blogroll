// Create new YUI instance, and populate it with the required modules
YUI().use('anim', 'node', function(Y) {
		var nodes = Y.all('.widget_halloween_blogroll');
		var container = nodes.item(0);
		if (!container) return;

		var witchNode = Y.Node.create('<div id="hbr_witch" style="position: absolute;"><img src="http://christmas-gifts.makers-online.co.uk/wp-content/plugins/halloween-blogroll/witch.png" /></div>');
		container.appendChild(witchNode);

		var height = container.getStyle('height');
		var rHeight = Math.floor(height.replace('px', ''));
		parseInt(rHeight);
		Y.log(rHeight);
		witchNode.setStyle('left', '-100px');
		var newAnim = new Y.Anim({
				node: witchNode,
				from: {
						left: -50
				},
				to: {
						left: container.get('offsetWidth')
				},
				duration: 10
		});
		var randomNumber=Math.floor(Math.random() * rHeight);
		witchNode.setStyle('top', randomNumber + 'px');
		
		var repeater = function() {
				var randomNumber=Math.floor(Math.random() * rHeight);
				Y.log(randomNumber);
				witchNode.setStyle('top', randomNumber + 'px');
				witchNode.setStyle('left', '-50px');
				witchNode.setStyle('display', 'block');		
				newAnim.run();
		};

		newAnim.on('end', function() {
				Y.later(5000, null, repeater);
		});

		newAnim.run();
    // Node available, and ready for use.
 
});