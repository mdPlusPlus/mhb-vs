<?xml version="1.0" encoding="UTF-8"?><xsl:stylesheet version="2.0"                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"                xmlns:outline="http://wkhtmltopdf.org/outline"                xmlns="http://www.w3.org/1999/xhtml">  <xsl:output doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"              doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"              indent="yes" />  <xsl:template match="outline:outline">    <html>      <head>        <title>Inhaltsverzeichnis</title>        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        <style>          h1 {            text-align: center;            font-size: 14px;          }          div {border-bottom: 1px dashed rgb(200,200,200);}          span.pages {			float: right;		  }				  span.fachgebiet {font-weight: bold;}		            li {list-style: none;}          ul {            font-size: 12px;            padding-left: 0em;          }          ul ul {font-size: 100%; padding-left: 1em;}          a {text-decoration:none; color: black;}        </style>      </head>      <body>        <h1>Inhaltsverzeichnis</h1>        <ul><xsl:apply-templates select="outline:item/outline:item"/></ul>      </body>    </html>  </xsl:template>    <xsl:template match="outline:item">    <li>      <xsl:if test="@title!='' and @title!='Inhaltsverzeichnis'">		        <div>          <a>            <xsl:if test="@link">              <xsl:attribute name="href"><xsl:value-of select="@link"/></xsl:attribute>            </xsl:if>            <xsl:if test="@backLink">              <xsl:attribute name="name"><xsl:value-of select="@backLink"/></xsl:attribute>            </xsl:if>						<xsl:if test="not(contains(@title, '('))">			  <span class="fachgebiet"><xsl:value-of select="@title" /></span>			</xsl:if>						<xsl:if test="contains(@title, '(')">              <xsl:number value="position()"/>. <xsl:value-of select="@title" />			</xsl:if>			          </a>			          <span class="pages"><xsl:value-of select="@page" /></span>        </div>      </xsl:if>      <ul>        <xsl:comment>added to prevent self-closing tags in QtXmlPatterns</xsl:comment>        <xsl:apply-templates select="outline:item"/>      </ul>    </li>  </xsl:template></xsl:stylesheet>