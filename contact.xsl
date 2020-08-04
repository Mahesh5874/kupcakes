<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<head>
<style>
	body{
	margin: 0px;
    padding: 0px;
    font-family: "montserrat",sans-serif;
    background: #313840;

	}
	h1{
	padding:10px;
	color:white;
	}
	table{
	border-collapse: collapse;
	width:100%;
	}

	th,td{
	text-align: left;
	padding: 10px;
	}

	tr:nth-child(even){
	background-color:#f2f2f2;
	}

	tr:nth-child(odd){
	background-color:#fff;
	}

	th{
	background-color: #4CAF50;
	color:white;
	}
</style>
</head>
<body>
<h1 align="center">Contact Details</h1>
<table border="3" align="center" >
<tr>
	<th>Branch</th>
	<th>City</th>
	<th>Phone</th>
	<th>E-mail</th>
</tr>
	<xsl:for-each select="student/s">
<tr>
	<td><xsl:value-of select="branch"/></td>
	<td><xsl:value-of select="city"/></td>
	<td><xsl:value-of select="phone"/></td>
	<td><xsl:value-of select="email"/></td>
</tr>
	</xsl:for-each>
	</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
