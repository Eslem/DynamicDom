<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:template match="/">
		<html>
			<body>

				<div class=" block form " >
					<h3 class="text-primary">Padre</h3>
					<select id="padre"  onchange="padre()">
						<xsl:for-each select="xml/usuario">
							<option><xsl:value-of select="nombre" /></option>
						</xsl:for-each>
					</select>
				</div>

				<div class="block form" >
					<h3 class="text-primary">Hijo</h3>
					<select id="hijo" name="name[]" multiple="">
						<option>gwege</option>
					</select>
					<button class="btn btn-default" onClick="add()"> + </button>
				</div>

				<div class="form" id="send" >
				<h3 class="text-primary">Formulario</h3>
				<form id="form" action="mostrar.php" method="post" role="form" class="form-inline">
				<div class="form-group" id="a-enviar" >

				</div><br />
				<button class="btn btn-lg btn-block btn-primary" type="submit">Enviar</button>
				</form>
				</div>

			</body>
		</html>
	</xsl:template>

</xsl:stylesheet>