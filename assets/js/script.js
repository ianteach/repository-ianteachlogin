const txtElement = [ 'PC Router"', 'SSH,SSL,NTP Server"', 'DHCP Server"', 'FTP Server"', 'File Server"', 'Web Server"', 'DNS Server"', 'Database Server"', 'Mail Server"', 'Proxy Server"' ];
let count = 0;
let txtIndex = 0;
let currentTxt = '';
let words = '';

(function ngetik ()
{

	if (count == txtElement.length) {
		count = 0;
	}

	currentTxt = txtElement[ count ];

	words = currentTxt.slice(0, ++txtIndex);
	// @ts-ignore
	document.querySelector('.efek-ngetik').textContent = words;

	if (words.length == currentTxt.length) {
		count++;
		txtIndex = 0;
	}

	setTimeout(ngetik, 500);

})();