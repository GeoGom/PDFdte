<?php
include 'phpFunctions.php';

//$json = $_POST['']; recibe el json 
//$print = $_POST['']; recibe el modo en que se debe mostrar 1 (vista en panatalla)  2 (descarga)
$print = 2;
$json = '		{
 		  "identificacion": {
 		    "version": 1,
 		    "ambiente": "01",
 		    "tipoDte": "01",
 		    "numeroControl": "DTE-01-S001P001-000000000003725",
 		    "codigoGeneracion": "750DB3B3-4E0C-11F0-8758-F23C91ADD57D",
 		    "tipoModelo": 1,
 		    "tipoOperacion": 1,
 		    "tipoContingencia": null,
 		    "motivoContin": null,
 		    "fecEmi": "2025-06-20",
 		    "horEmi": "13:26:31",
 		    "tipoMoneda": "USD"
 		  },
 		  "documentoRelacionado": null,
 		  "otrosDocumentos": null,
 		  "emisor": {
 		    "nit": "12181706851011",
 		    "nrc": "1989850",
 		    "nombre": "AGROFERRETERIA EL AMIGO SUC-1",
 		    "codActividad": "46632",
 		    "descActividad": "Venta al por mayor de artículos de ferretería y pinturerías",
 		    "nombreComercial": "AGROFERRETERIA EL AMIGO SUC-1",
 		    "tipoEstablecimiento": "01",
 		    "direccion": {
 		      "departamento": "11",
 		      "municipio": "23",
 		      "complemento": "COLONIA EL PARAISO, PUERTO PARADA, USULUTAN, USULUTAN"
 		    },
 		    "telefono": "26321308",
 		    "correo": "oficinalisz@gmail.com",
 		    "codEstableMH": null,
 		    "codEstable": null,
 		    "codPuntoVentaMH": null,
 		    "codPuntoVenta": null
 		  },
 		  "receptor": {
 			"tipoDocumento": null,
 		    "numDocumento":	null,
 		    "nrc": null,
 		    "nombre": "HERBERTH NEFTALI AGUILAR MARQUEZ",
 		    "codActividad": null,
 		    "descActividad": null,
 		    "direccion": 				    {
 				      "departamento": "11",
 				      "municipio": "23",
 				      "complemento": "CAS.LAZO"
 				    },
 		    "telefono": "63147785",
 		    "correo": null
 		  },
 		  "ventaTercero": null,
 		  "cuerpoDocumento": [
 						{
 			  "numeroDocumento": null,
 			  "numItem": 1,
 			  "tipoItem": 3,
 			  "cantidad": 4.00,
 			  "codigo": "0838",
 			  "uniMedida": 59,
 			  "descripcion": "TUBO ESTRUC GAL. 1 12X 1 12 CH-16 1.50MM",
 			  "precioUni": 23.00000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 92.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 10.58407080,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 2,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "0824",
 			  "uniMedida": 59,
 			  "descripcion": "ANGULO DE 1-12 X 18 ORIGINAL",
 			  "precioUni": 13.50000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 13.50000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 1.55309735,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 3,
 			  "tipoItem": 3,
 			  "cantidad": 4.00,
 			  "codigo": "0816",
 			  "uniMedida": 59,
 			  "descripcion": "TUBO ESTRUC. 1X 1 GAL. CH-16 1.50MM",
 			  "precioUni": 14.50000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 58.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 6.67256637,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 4,
 			  "tipoItem": 3,
 			  "cantidad": 6.00,
 			  "codigo": "6951974616831",
 			  "uniMedida": 59,
 			  "descripcion": "ELECTRODO CENMET E6013 332",
 			  "precioUni": 1.16666667,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 7.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 0.80530973,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 5,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "0803",
 			  "uniMedida": 59,
 			  "descripcion": "ANGULO DE 1 X 18",
 			  "precioUni": 13.00000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 13.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 1.49557522,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 6,
 			  "tipoItem": 3,
 			  "cantidad": 2.00,
 			  "codigo": "0767",
 			  "uniMedida": 59,
 			  "descripcion": "VARILLA LISA DE 58 X 6M",
 			  "precioUni": 3.25000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 6.50000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 0.74778761,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 7,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "0797",
 			  "uniMedida": 59,
 			  "descripcion": "CAÑO NEGRO LISO DE 12 X 6M",
 			  "precioUni": 3.00000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 3.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 0.34513274,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 8,
 			  "tipoItem": 3,
 			  "cantidad": 6.00,
 			  "codigo": "0800",
 			  "uniMedida": 59,
 			  "descripcion": "LAMINA 116  2X1CH-16 (1.35MM)",
 			  "precioUni": 29.00000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 174.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 20.01769912,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 9,
 			  "tipoItem": 3,
 			  "cantidad": 5.00,
 			  "codigo": "6925582181319",
 			  "uniMedida": 59,
 			  "descripcion": "DISCO PARA HIERRO 1.2MM TOTAL",
 			  "precioUni": 1.25000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 6.25000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 0.71902655,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 10,
 			  "tipoItem": 3,
 			  "cantidad": 15.00,
 			  "codigo": "01",
 			  "uniMedida": 59,
 			  "descripcion": "SERVICIO DE TRANSPORTE.",
 			  "precioUni": 1.00000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 15.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 1.72566372,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 11,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "0634",
 			  "uniMedida": 59,
 			  "descripcion": "TUBO PVC 8 X 63PSI GRIS X 6M SDR 64",
 			  "precioUni": 55.00000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 55.00000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 6.32743363,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 12,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "0703",
 			  "uniMedida": 59,
 			  "descripcion": "CEMENTO HOLCIM FUERTE PORTLAN",
 			  "precioUni": 9.65000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 9.65000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 1.11017699,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 13,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "04001",
 			  "uniMedida": 59,
 			  "descripcion": "SIKAFLEX SALCHICHA DE 600ML",
 			  "precioUni": 16.50000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 16.50000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 1.89823009,
 			  "psv": 0.0
 			},			{
 			  "numeroDocumento": null,
 			  "numItem": 14,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "8012232101457",
 			  "uniMedida": 59,
 			  "descripcion": "CHAPA YALE  CERRADURA DERECHA",
 			  "precioUni": 27.50000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 27.50000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 3.16371681,
 			  "psv": 0.0
 			}
 		  ],
 		  "resumen": {
 		    "totalNoSuj": 0.00,
 		    "totalExenta": 0.00,
 		    "totalGravada": 496.90,
 		    "subTotalVentas": 496.90,
 		    "descuNoSuj": 0.00,
 		    "descuExenta": 0.00,
 		    "descuGravada": 0.00,
 		    "porcentajeDescuento": 0.00,
 		    "totalDescu": 0.00,
 		    "tributos": null,
 			"totalIva": 57.17,
 		    "subTotal": 496.90,
 		    "ivaRete1": 0.00,
 		    "reteRenta": 0.00,
 		    "montoTotalOperacion": 496.90,
 		    "totalNoGravado": 0.0,
 		    "totalPagar": 496.90,
 		    "totalLetras": "CUATROCIENTOS NOVENTA Y SEIS  CON 90/100 USD",
 		    "saldoFavor": 0.0,
 		    "condicionOperacion": 1,
 		    "pagos": null,
 		    "numPagoElectronico": null
 		  },
 		  "extension": {
 		    "nombEntrega": null,
 		    "docuEntrega": null,
 		    "nombRecibe": null,
 		    "docuRecibe": null,
 		    "observaciones": null,
 		    "placaVehiculo": null
 		  },
 		  "apendice": null
 		,
"estado": "PROCESADO",
"selloRecibido": "2025D06C1AE1684D4123B928690BAF3E27ACVGSB",
"fhProcesamiento": "20/06/2025 13:26:33",
"observaciones": ,
"firma": "eyJhbGciOiJSUzUxMiJ9.ewogICJpZGVudGlmaWNhY2lvbiIgOiB7CiAgICAidmVyc2lvbiIgOiAxLAogICAgImFtYmllbnRlIiA6ICIwMSIsCiAgICAidGlwb0R0ZSIgOiAiMDEiLAogICAgIm51bWVyb0NvbnRyb2wiIDogIkRURS0wMS1TMDAxUDAwMS0wMDAwMDAwMDAwMDM3MjUiLAogICAgImNvZGlnb0dlbmVyYWNpb24iIDogIjc1MERCM0IzLTRFMEMtMTFGMC04NzU4LUYyM0M5MUFERDU3RCIsCiAgICAidGlwb01vZGVsbyIgOiAxLAogICAgInRpcG9PcGVyYWNpb24iIDogMSwKICAgICJ0aXBvQ29udGluZ2VuY2lhIiA6IG51bGwsCiAgICAibW90aXZvQ29udGluIiA6IG51bGwsCiAgICAiZmVjRW1pIiA6ICIyMDI1LTA2LTIwIiwKICAgICJob3JFbWkiIDogIjEzOjI2OjMxIiwKICAgICJ0aXBvTW9uZWRhIiA6ICJVU0QiCiAgfSwKICAiZG9jdW1lbnRvUmVsYWNpb25hZG8iIDogbnVsbCwKICAib3Ryb3NEb2N1bWVudG9zIiA6IG51bGwsCiAgImVtaXNvciIgOiB7CiAgICAibml0IiA6ICIxMjE4MTcwNjg1MTAxMSIsCiAgICAibnJjIiA6ICIxOTg5ODUwIiwKICAgICJub21icmUiIDogIkFHUk9GRVJSRVRFUklBIEVMIEFNSUdPIFNVQy0xIiwKICAgICJjb2RBY3RpdmlkYWQiIDogIjQ2NjMyIiwKICAgICJkZXNjQWN0aXZpZGFkIiA6ICJWZW50YSBhbCBwb3IgbWF5b3IgZGUgYXJ0w61jdWxvcyBkZSBmZXJyZXRlcsOtYSB5IHBpbnR1cmVyw61hcyIsCiAgICAibm9tYnJlQ29tZXJjaWFsIiA6ICJBR1JPRkVSUkVURVJJQSBFTCBBTUlHTyBTVUMtMSIsCiAgICAidGlwb0VzdGFibGVjaW1pZW50byIgOiAiMDEiLAogICAgImRpcmVjY2lvbiIgOiB7CiAgICAgICJkZXBhcnRhbWVudG8iIDogIjExIiwKICAgICAgIm11bmljaXBpbyIgOiAiMjMiLAogICAgICAiY29tcGxlbWVudG8iIDogIkNPTE9OSUEgRUwgUEFSQUlTTywgUFVFUlRPIFBBUkFEQSwgVVNVTFVUQU4sIFVTVUxVVEFOIgogICAgfSwKICAgICJ0ZWxlZm9ubyIgOiAiMjYzMjEzMDgiLAogICAgImNvcnJlbyIgOiAib2ZpY2luYWxpc3pAZ21haWwuY29tIiwKICAgICJjb2RFc3RhYmxlTUgiIDogbnVsbCwKICAgICJjb2RFc3RhYmxlIiA6IG51bGwsCiAgICAiY29kUHVudG9WZW50YU1IIiA6IG51bGwsCiAgICAiY29kUHVudG9WZW50YSIgOiBudWxsCiAgfSwKICAicmVjZXB0b3IiIDogewogICAgInRpcG9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1Eb2N1bWVudG8iIDogbnVsbCwKICAgICJucmMiIDogbnVsbCwKICAgICJub21icmUiIDogIkhFUkJFUlRIIE5FRlRBTEkgQUdVSUxBUiBNQVJRVUVaIiwKICAgICJjb2RBY3RpdmlkYWQiIDogbnVsbCwKICAgICJkZXNjQWN0aXZpZGFkIiA6IG51bGwsCiAgICAiZGlyZWNjaW9uIiA6IHsKICAgICAgImRlcGFydGFtZW50byIgOiAiMTEiLAogICAgICAibXVuaWNpcGlvIiA6ICIyMyIsCiAgICAgICJjb21wbGVtZW50byIgOiAiQ0FTLkxBWk8iCiAgICB9LAogICAgInRlbGVmb25vIiA6ICI2MzE0Nzc4NSIsCiAgICAiY29ycmVvIiA6IG51bGwKICB9LAogICJ2ZW50YVRlcmNlcm8iIDogbnVsbCwKICAiY3VlcnBvRG9jdW1lbnRvIiA6IFsgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogMSwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDQuMCwKICAgICJjb2RpZ28iIDogIjA4MzgiLAogICAgInVuaU1lZGlkYSIgOiA1OSwKICAgICJkZXNjcmlwY2lvbiIgOiAiVFVCTyBFU1RSVUMgR0FMLiAxIDEyWCAxIDEyIENILTE2IDEuNTBNTSIsCiAgICAicHJlY2lvVW5pIiA6IDIzLjAsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiA5Mi4wLAogICAgIm5vR3JhdmFkbyIgOiAwLjAsCiAgICAiY29kVHJpYnV0byIgOiBudWxsLAogICAgInRyaWJ1dG9zIiA6IG51bGwsCiAgICAiaXZhSXRlbSIgOiAxMC41ODQwNzA4LAogICAgInBzdiIgOiAwLjAKICB9LCB7CiAgICAibnVtZXJvRG9jdW1lbnRvIiA6IG51bGwsCiAgICAibnVtSXRlbSIgOiAyLAogICAgInRpcG9JdGVtIiA6IDMsCiAgICAiY2FudGlkYWQiIDogMS4wLAogICAgImNvZGlnbyIgOiAiMDgyNCIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJBTkdVTE8gREUgMS0xMiBYIDE4IE9SSUdJTkFMIiwKICAgICJwcmVjaW9VbmkiIDogMTMuNSwKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDEzLjUsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogbnVsbCwKICAgICJpdmFJdGVtIiA6IDEuNTUzMDk3MzUsCiAgICAicHN2IiA6IDAuMAogIH0sIHsKICAgICJudW1lcm9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1JdGVtIiA6IDMsCiAgICAidGlwb0l0ZW0iIDogMywKICAgICJjYW50aWRhZCIgOiA0LjAsCiAgICAiY29kaWdvIiA6ICIwODE2IiwKICAgICJ1bmlNZWRpZGEiIDogNTksCiAgICAiZGVzY3JpcGNpb24iIDogIlRVQk8gRVNUUlVDLiAxWCAxIEdBTC4gQ0gtMTYgMS41ME1NIiwKICAgICJwcmVjaW9VbmkiIDogMTQuNSwKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDU4LjAsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogbnVsbCwKICAgICJpdmFJdGVtIiA6IDYuNjcyNTY2MzcsCiAgICAicHN2IiA6IDAuMAogIH0sIHsKICAgICJudW1lcm9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1JdGVtIiA6IDQsCiAgICAidGlwb0l0ZW0iIDogMywKICAgICJjYW50aWRhZCIgOiA2LjAsCiAgICAiY29kaWdvIiA6ICI2OTUxOTc0NjE2ODMxIiwKICAgICJ1bmlNZWRpZGEiIDogNTksCiAgICAiZGVzY3JpcGNpb24iIDogIkVMRUNUUk9ETyBDRU5NRVQgRTYwMTMgMzMyIiwKICAgICJwcmVjaW9VbmkiIDogMS4xNjY2NjY2NywKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDcuMCwKICAgICJub0dyYXZhZG8iIDogMC4wLAogICAgImNvZFRyaWJ1dG8iIDogbnVsbCwKICAgICJ0cmlidXRvcyIgOiBudWxsLAogICAgIml2YUl0ZW0iIDogMC44MDUzMDk3MywKICAgICJwc3YiIDogMC4wCiAgfSwgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogNSwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDEuMCwKICAgICJjb2RpZ28iIDogIjA4MDMiLAogICAgInVuaU1lZGlkYSIgOiA1OSwKICAgICJkZXNjcmlwY2lvbiIgOiAiQU5HVUxPIERFIDEgWCAxOCIsCiAgICAicHJlY2lvVW5pIiA6IDEzLjAsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiAxMy4wLAogICAgIm5vR3JhdmFkbyIgOiAwLjAsCiAgICAiY29kVHJpYnV0byIgOiBudWxsLAogICAgInRyaWJ1dG9zIiA6IG51bGwsCiAgICAiaXZhSXRlbSIgOiAxLjQ5NTU3NTIyLAogICAgInBzdiIgOiAwLjAKICB9LCB7CiAgICAibnVtZXJvRG9jdW1lbnRvIiA6IG51bGwsCiAgICAibnVtSXRlbSIgOiA2LAogICAgInRpcG9JdGVtIiA6IDMsCiAgICAiY2FudGlkYWQiIDogMi4wLAogICAgImNvZGlnbyIgOiAiMDc2NyIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJWQVJJTExBIExJU0EgREUgNTggWCA2TSIsCiAgICAicHJlY2lvVW5pIiA6IDMuMjUsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiA2LjUsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogbnVsbCwKICAgICJpdmFJdGVtIiA6IDAuNzQ3Nzg3NjEsCiAgICAicHN2IiA6IDAuMAogIH0sIHsKICAgICJudW1lcm9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1JdGVtIiA6IDcsCiAgICAidGlwb0l0ZW0iIDogMywKICAgICJjYW50aWRhZCIgOiAxLjAsCiAgICAiY29kaWdvIiA6ICIwNzk3IiwKICAgICJ1bmlNZWRpZGEiIDogNTksCiAgICAiZGVzY3JpcGNpb24iIDogIkNBw5FPIE5FR1JPIExJU08gREUgMTIgWCA2TSIsCiAgICAicHJlY2lvVW5pIiA6IDMuMCwKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDMuMCwKICAgICJub0dyYXZhZG8iIDogMC4wLAogICAgImNvZFRyaWJ1dG8iIDogbnVsbCwKICAgICJ0cmlidXRvcyIgOiBudWxsLAogICAgIml2YUl0ZW0iIDogMC4zNDUxMzI3NCwKICAgICJwc3YiIDogMC4wCiAgfSwgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogOCwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDYuMCwKICAgICJjb2RpZ28iIDogIjA4MDAiLAogICAgInVuaU1lZGlkYSIgOiA1OSwKICAgICJkZXNjcmlwY2lvbiIgOiAiTEFNSU5BIDExNiAgMlgxQ0gtMTYgKDEuMzVNTSkiLAogICAgInByZWNpb1VuaSIgOiAyOS4wLAogICAgIm1vbnRvRGVzY3UiIDogMC4wLAogICAgInZlbnRhTm9TdWoiIDogMC4wLAogICAgInZlbnRhRXhlbnRhIiA6IDAuMCwKICAgICJ2ZW50YUdyYXZhZGEiIDogMTc0LjAsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogbnVsbCwKICAgICJpdmFJdGVtIiA6IDIwLjAxNzY5OTEyLAogICAgInBzdiIgOiAwLjAKICB9LCB7CiAgICAibnVtZXJvRG9jdW1lbnRvIiA6IG51bGwsCiAgICAibnVtSXRlbSIgOiA5LAogICAgInRpcG9JdGVtIiA6IDMsCiAgICAiY2FudGlkYWQiIDogNS4wLAogICAgImNvZGlnbyIgOiAiNjkyNTU4MjE4MTMxOSIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJESVNDTyBQQVJBIEhJRVJSTyAxLjJNTSBUT1RBTCIsCiAgICAicHJlY2lvVW5pIiA6IDEuMjUsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiA2LjI1LAogICAgIm5vR3JhdmFkbyIgOiAwLjAsCiAgICAiY29kVHJpYnV0byIgOiBudWxsLAogICAgInRyaWJ1dG9zIiA6IG51bGwsCiAgICAiaXZhSXRlbSIgOiAwLjcxOTAyNjU1LAogICAgInBzdiIgOiAwLjAKICB9LCB7CiAgICAibnVtZXJvRG9jdW1lbnRvIiA6IG51bGwsCiAgICAibnVtSXRlbSIgOiAxMCwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDE1LjAsCiAgICAiY29kaWdvIiA6ICIwMSIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJTRVJWSUNJTyBERSBUUkFOU1BPUlRFLiIsCiAgICAicHJlY2lvVW5pIiA6IDEuMCwKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDE1LjAsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogbnVsbCwKICAgICJpdmFJdGVtIiA6IDEuNzI1NjYzNzIsCiAgICAicHN2IiA6IDAuMAogIH0sIHsKICAgICJudW1lcm9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1JdGVtIiA6IDExLAogICAgInRpcG9JdGVtIiA6IDMsCiAgICAiY2FudGlkYWQiIDogMS4wLAogICAgImNvZGlnbyIgOiAiMDYzNCIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJUVUJPIFBWQyA4IFggNjNQU0kgR1JJUyBYIDZNIFNEUiA2NCIsCiAgICAicHJlY2lvVW5pIiA6IDU1LjAsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiA1NS4wLAogICAgIm5vR3JhdmFkbyIgOiAwLjAsCiAgICAiY29kVHJpYnV0byIgOiBudWxsLAogICAgInRyaWJ1dG9zIiA6IG51bGwsCiAgICAiaXZhSXRlbSIgOiA2LjMyNzQzMzYzLAogICAgInBzdiIgOiAwLjAKICB9LCB7CiAgICAibnVtZXJvRG9jdW1lbnRvIiA6IG51bGwsCiAgICAibnVtSXRlbSIgOiAxMiwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDEuMCwKICAgICJjb2RpZ28iIDogIjA3MDMiLAogICAgInVuaU1lZGlkYSIgOiA1OSwKICAgICJkZXNjcmlwY2lvbiIgOiAiQ0VNRU5UTyBIT0xDSU0gRlVFUlRFIFBPUlRMQU4iLAogICAgInByZWNpb1VuaSIgOiA5LjY1LAogICAgIm1vbnRvRGVzY3UiIDogMC4wLAogICAgInZlbnRhTm9TdWoiIDogMC4wLAogICAgInZlbnRhRXhlbnRhIiA6IDAuMCwKICAgICJ2ZW50YUdyYXZhZGEiIDogOS42NSwKICAgICJub0dyYXZhZG8iIDogMC4wLAogICAgImNvZFRyaWJ1dG8iIDogbnVsbCwKICAgICJ0cmlidXRvcyIgOiBudWxsLAogICAgIml2YUl0ZW0iIDogMS4xMTAxNzY5OSwKICAgICJwc3YiIDogMC4wCiAgfSwgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogMTMsCiAgICAidGlwb0l0ZW0iIDogMywKICAgICJjYW50aWRhZCIgOiAxLjAsCiAgICAiY29kaWdvIiA6ICIwNDAwMSIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJTSUtBRkxFWCBTQUxDSElDSEEgREUgNjAwTUwiLAogICAgInByZWNpb1VuaSIgOiAxNi41LAogICAgIm1vbnRvRGVzY3UiIDogMC4wLAogICAgInZlbnRhTm9TdWoiIDogMC4wLAogICAgInZlbnRhRXhlbnRhIiA6IDAuMCwKICAgICJ2ZW50YUdyYXZhZGEiIDogMTYuNSwKICAgICJub0dyYXZhZG8iIDogMC4wLAogICAgImNvZFRyaWJ1dG8iIDogbnVsbCwKICAgICJ0cmlidXRvcyIgOiBudWxsLAogICAgIml2YUl0ZW0iIDogMS44OTgyMzAwOSwKICAgICJwc3YiIDogMC4wCiAgfSwgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogMTQsCiAgICAidGlwb0l0ZW0iIDogMywKICAgICJjYW50aWRhZCIgOiAxLjAsCiAgICAiY29kaWdvIiA6ICI4MDEyMjMyMTAxNDU3IiwKICAgICJ1bmlNZWRpZGEiIDogNTksCiAgICAiZGVzY3JpcGNpb24iIDogIkNIQVBBIFlBTEUgIENFUlJBRFVSQSBERVJFQ0hBIiwKICAgICJwcmVjaW9VbmkiIDogMjcuNSwKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDI3LjUsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogbnVsbCwKICAgICJpdmFJdGVtIiA6IDMuMTYzNzE2ODEsCiAgICAicHN2IiA6IDAuMAogIH0gXSwKICAicmVzdW1lbiIgOiB7CiAgICAidG90YWxOb1N1aiIgOiAwLjAsCiAgICAidG90YWxFeGVudGEiIDogMC4wLAogICAgInRvdGFsR3JhdmFkYSIgOiA0OTYuOSwKICAgICJzdWJUb3RhbFZlbnRhcyIgOiA0OTYuOSwKICAgICJkZXNjdU5vU3VqIiA6IDAuMCwKICAgICJkZXNjdUV4ZW50YSIgOiAwLjAsCiAgICAiZGVzY3VHcmF2YWRhIiA6IDAuMCwKICAgICJwb3JjZW50YWplRGVzY3VlbnRvIiA6IDAuMCwKICAgICJ0b3RhbERlc2N1IiA6IDAuMCwKICAgICJ0cmlidXRvcyIgOiBudWxsLAogICAgInRvdGFsSXZhIiA6IDU3LjE3LAogICAgInN1YlRvdGFsIiA6IDQ5Ni45LAogICAgIml2YVJldGUxIiA6IDAuMCwKICAgICJyZXRlUmVudGEiIDogMC4wLAogICAgIm1vbnRvVG90YWxPcGVyYWNpb24iIDogNDk2LjksCiAgICAidG90YWxOb0dyYXZhZG8iIDogMC4wLAogICAgInRvdGFsUGFnYXIiIDogNDk2LjksCiAgICAidG90YWxMZXRyYXMiIDogIkNVQVRST0NJRU5UT1MgTk9WRU5UQSBZIFNFSVMgIENPTiA5MC8xMDAgVVNEIiwKICAgICJzYWxkb0Zhdm9yIiA6IDAuMCwKICAgICJjb25kaWNpb25PcGVyYWNpb24iIDogMSwKICAgICJwYWdvcyIgOiBudWxsLAogICAgIm51bVBhZ29FbGVjdHJvbmljbyIgOiBudWxsCiAgfSwKICAiZXh0ZW5zaW9uIiA6IHsKICAgICJub21iRW50cmVnYSIgOiBudWxsLAogICAgImRvY3VFbnRyZWdhIiA6IG51bGwsCiAgICAibm9tYlJlY2liZSIgOiBudWxsLAogICAgImRvY3VSZWNpYmUiIDogbnVsbCwKICAgICJvYnNlcnZhY2lvbmVzIiA6IG51bGwsCiAgICAicGxhY2FWZWhpY3VsbyIgOiBudWxsCiAgfSwKICAiYXBlbmRpY2UiIDogbnVsbAp9.ST7BVi_NcERyoqosy181k0z4shA8Reo0Ye8eJIOmyEb2KvsW_bYl71D4WMlW6kc2zH4EtP71SPI8ZxHiORu0hF4H17DL3yxcVmrC4WpKz0ShZa4ZDWKtETBFm-khUob4RjhR2fuMToqlcLJQBhsX80oc3k4NiqVg9_hanwrSKz8L9WkQhpv1QHUbF80rwIm8rLdGvUEbcYNTC4uyCPiY6rZqKkf6cJCDRr940lC-wCrY9RwzNuVob_J_iR7N89-f_SJg267T5VPJI05TvRdgt9dALgqWPdZRiml0ipzuCAFyQ9AorEHOK_EOlvqKYWq3AwI9nM7GmVbXca5NtTwTWQ"
}';


$json = preg_replace('/"observaciones"\s*:\s*,/', '"observaciones": null,', $json);
$data = json_decode($json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error al decodificar JSON: " . json_last_error_msg();
    exit;
}




//IDENTIFICACION 
$version         = $data['identificacion']['version'];          // Ejemplo: 1
$ambiente        = $data['identificacion']['ambiente'];         // Ejemplo: "01"
$tipoDte         = $data['identificacion']['tipoDte'];          // Ejemplo: "01"
$numeroControl   = $data['identificacion']['numeroControl'];    // Ejemplo: "DTE-01-S001P002-..."
$codigoGeneracion= $data['identificacion']['codigoGeneracion']; // Ejemplo: "2115B283-4E18-11F0-..."
$tipoModelo      = $data['identificacion']['tipoModelo'];       // Ejemplo: 1
$tipoOperacion   = $data['identificacion']['tipoOperacion'];    // Ejemplo: 1
$tipoContingencia= $data['identificacion']['tipoContingencia']; // Puede ser null
$motivoContin    = $data['identificacion']['motivoContin'];     // Puede ser null
$fecEmi          = $data['identificacion']['fecEmi'];           // Ejemplo: "2025-06-20"
$horEmi          = $data['identificacion']['horEmi'];           // Ejemplo: "14:50:01"
$tipoMoneda      = $data['identificacion']['tipoMoneda'];       // Ejemplo: "USD"
$selloRecibido   = $data['selloRecibido'];
$estado          = $data['estado'];
$fechaTransmision = $data['fhProcesamiento'];


//EMISOR
$nit               = $data['emisor']['nit'];
$nrc               = $data['emisor']['nrc'];
$nombre            = $data['emisor']['nombre'];
$codActividad      = $data['emisor']['codActividad'];
$descActividad     = $data['emisor']['descActividad'];
$nombreComercial   = $data['emisor']['nombreComercial'];
$tipoEstablecimiento = $data['emisor']['tipoEstablecimiento'];

// Dirección dentro de emisor
$departamento      = $data['emisor']['direccion']['departamento'];
$municipio         = $data['emisor']['direccion']['municipio'];
$complemento       = $data['emisor']['direccion']['complemento'];

$telefono          = $data['emisor']['telefono'];
$correo            = $data['emisor']['correo'];
$codEstableMH      = $data['emisor']['codEstableMH'];
$codEstable        = $data['emisor']['codEstable'];
$codPuntoVentaMH   = $data['emisor']['codPuntoVentaMH'];
$codPuntoVenta     = $data['emisor']['codPuntoVenta'];


//RECEPTOR
$tipoDocumento     = $data['receptor']['tipoDocumento'];
$numDocumento      = $data['receptor']['numDocumento'];
$nrcReceptor       = $data['receptor']['nrc'];
$nombreReceptor    = $data['receptor']['nombre'];
$codActividadReceptor = $data['receptor']['codActividad'];
$descActividadReceptor = $data['receptor']['descActividad'];
$direccion_recept_complemento       = $data['receptor']['direccion']['complemento'];
//$direccionReceptor = $data['receptor']['direccion']; er un array
$direccionArray = $data['receptor']['direccion'];
$direccionReceptor = implode(', ', $direccionArray);
$telefonoReceptor  = $data['receptor']['telefono'];
$correoReceptor    = $data['receptor']['correo'];





$cuerpoDocumento = $data['cuerpoDocumento'];



$QR_data = "https://admin.factura.gob.sv/consultaPublica?ambiente=01&codGen=".$codigoGeneracion."&fechaEmi=".$fecEmi;





require_once('tcpdf/tcpdf.php');
//Estilo para codigo QR
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(0, 0, 0, true);
$pdf->AddPage();

$titulo1max = 14;
$titulo1 = 10;
$titulo2 = 8;
$texto = 6;

//DATOS DEL DOCUMENTO ELECTRONICO Y QR

// Imprimir un cuadrado como caja de texto sin fondo
//$pdf->Rect(x, y, ancho, alto, 'D', array(), array(0,0,0));
$pdf->Rect(90, 10, 112, 45, 'D', array(), array(0,0,0));

$pdf->SetXY(90, 12); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo1max); //formato de la celda
$pdf->Cell(0, 3, 'FACTURA DE CONSUMIDOR FINAL' , 0, 1, 'C');//contenido de la celda

$x_documento = 92;
$x_documento2 = 120;

// Imprimir una línea divisoria
$pdf->Line($x_documento, 20, 198, 20, array('width' => 0.5, 'color' => array(0,0,0)));

//imprecion de codigo QR
//$pdf->write2DBarcode(contenido del QR, 'QRCODE,H', x, y, ancho, alto, $style, 'N');
$pdf->write2DBarcode($QR_data, 'QRCODE,H', 168, 22, 30, 30, $style, 'N');



$pdf->SetXY($x_documento, 22); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Codigo de Generacion:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 25); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $codigoGeneracion , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 28); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Numero de Control:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 31); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $numeroControl , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 34); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Sello de Resepcion:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 37); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $selloRecibido , 0, 1, 'L');//contenido de la celda 

$pdf->SetXY($x_documento, 40); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Fecha de Transmicion:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $fechaTransmision , 0, 1, 'L');//contenido de la celda 

$pdf->SetXY($x_documento, 46); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Fecha de Emision:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 49); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $fecEmi , 0, 1, 'L');//contenido de la celda


$pdf->SetXY($x_documento2, 40); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Modelo de Facturacion:" , 0, 1, 'L');//contenido de la celda
/*
$pdf->SetXY($x_documento2, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $tipoModelo , 0, 1, 'L');//contenido de la celda 
*/
$pdf->SetXY($x_documento2, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, 'PREVIO' , 0, 1, 'L');//contenido de la celda 
/*
$pdf->SetXY($x_documento2, 46); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Tipo de Transmision:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento2, 49); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $tipoDte , 0, 1, 'L');//contenido de la celda
*/



//DATOS DEL EMISOR DEL DOCUMENTO



// Establecer la posición de la imagen
$pdf->SetXY(8, 5);
// Insertar la imagen
$imagen = "img/img.png"; // Ruta de la imagen
$anchoMax = 85; // Ancho máximo permitido
$altoMax = 21; // Alto máximo permitido

// Insertar imagen ajustada proporcionalmente al cuadro
$pdf->Image(
    $imagen,
    '', '', // Posición X, Y (déjalos automáticos)
    $anchoMax,
    $altoMax,
    '', // Tipo de imagen
    '', // Link
    '', // Align
    false, // Resize (no estira la imagen a la fuerza)
    300, // DPI
    '', // Alt
    false, // isMask
    false, // imgMask
    0, // Border
    'L', // Fit box alignment (Left top corner)
    true // Fit box (mantiene proporción dentro del ancho/alto)
);

$x_emisor = 7;
$x_emisor2 = 40;
$y_emisor = 27;
$y_emisor_desplasamiento = 4;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, $nombre , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "NIT: " . $nit , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_emisor2, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "NRC: " . $nrc , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "Giro: " . $descActividad , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$direccion_parts = Salto_linea(65 , $complemento);

foreach ($direccion_parts as $part) {
    $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
    $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
    $pdf->Cell(0, 3, $part, 0, 1, 'L');
    $y_emisor = $y_emisor + $y_emisor_desplasamiento;
}


$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "Telefono: " . $telefono , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "E-Mail: " . $correo , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 58, 205, 58, array('width' => 0.5, 'color' => array(0,0,0)));




//DATOS DEL CLIENTE 


$x_cliente = 7;
$x_cliente2 = 50;
$y_cliente = 60;
$y_cliente_desplasamiento = 4;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Cliente: ". $nombreReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Direccion: ". $direccion_recept_complemento , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Telefono: ". $telefonoReceptor , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "E-Mail: ". $correoReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Doc: ". $numDocumento , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "NRC: ". $nrcReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Giro: ". $descActividadReceptor , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 80, 205, 80, array('width' => 0.5, 'color' => array(0,0,0)));



//DETALLE DEL documento :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


$y_detalle = 82;
$y_detale_incremento = 4;

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "No." , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 12, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "CODIGO" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 33, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "MEDIDA" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 45, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "DESCRIPCION" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 118, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "CANTIDAD" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 132, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "PRECIO" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 144, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "DESCUENTO" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 160, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "NO SUJETAS" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 176, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "EXENTAS" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 190, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "GRAVADAS" , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 88, 205, 88, array('width' => 0.5, 'color' => array(0,0,0)));

$item = 1;


$y_detalle = 90;
$y_detale_incremento = 4;

$gravada = null;
$exentas = null;
$no_sujetas = null;

$descuento_total = 0;
$SUMA = 0;
$suma_exentas = 0;
$pagianas = 1;
$max_y = $pdf->GetPageHeight();

foreach ($cuerpoDocumento as $rowP) {
  $numeroDocumento = $rowP['numeroDocumento'];  // puede ser null
  $numItem        = $rowP['numItem'];
  $tipoItem       = $rowP['tipoItem'];
  $cantidad       = $rowP['cantidad'];
  $codigo         = $rowP['codigo'];
  $uniMedida      = $rowP['uniMedida'];
  $descripcion    = $rowP['descripcion'];
  $precioUni      = $rowP['precioUni'];
  $montoDescu     = $rowP['montoDescu'];
  $ventaNoSuj     = $rowP['ventaNoSuj'];
  $ventaExenta    = $rowP['ventaExenta'];
  $ventaGravada   = $rowP['ventaGravada'];
  $noGravado      = $rowP['noGravado'];
  $codTributo     = $rowP['codTributo'];   // puede ser null
  $tributos       = $rowP['tributos'];     // puede ser null
  $ivaItem        = $rowP['ivaItem'];
  $psv            = $rowP['psv'];

  if ($pdf->GetY() >= $max_y -60) { // Ajusta este valor según tus necesidades

      // Imprimir una línea divisoria
      $pdf->Line(7, $max_y -55, 205, $max_y -55, array('width' => 0.5, 'color' => array(0,0,0)));

      $pdf->SetXY( 7, $max_y - 30); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Pagina: ".$pagianas , 0, 1, 'L');//contenido de la celda

      $pagianas = $pagianas + 1;
      
      //contenido de pie de pagina 

      
      // Agrega una nueva página
      $pdf->AddPage();
      // Reinicia la posición vertical a la parte superior de la página
      //DATOS DEL DOCUMENTO ELECTRONICO Y QR

      // Imprimir un cuadrado como caja de texto sin fondo
      //$pdf->Rect(x, y, ancho, alto, 'D', array(), array(0,0,0));
      $pdf->Rect(90, 10, 112, 45, 'D', array(), array(0,0,0));

      $pdf->SetXY(90, 12); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo1); //formato de la celda
      $pdf->Cell(0, 3, $tipo_documento , 0, 1, 'C');//contenido de la celda

      $x_documento = 92;
      $x_documento2 = 120;

      // Imprimir una línea divisoria
      $pdf->Line($x_documento, 20, 198, 20, array('width' => 0.5, 'color' => array(0,0,0)));

      //imprecion de codigo QR
      //$pdf->write2DBarcode(contenido del QR, 'QRCODE,H', x, y, ancho, alto, $style, 'N');
      $pdf->write2DBarcode($QR_data, 'QRCODE,H', 168, 22, 30, 30, $style, 'N');



      $pdf->SetXY($x_documento, 22); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Codigo de Generacion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 25); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $documento , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 28); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Numero de Control:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 31); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $control , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 34); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Sello de Resepcion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 37); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $sello , 0, 1, 'L');//contenido de la celda 

      $pdf->SetXY($x_documento, 40); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Fecha de Transmicion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 43); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $f_trasmision , 0, 1, 'L');//contenido de la celda 

      $pdf->SetXY($x_documento, 46); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Fecha de Emision:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 49); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $f_emicion , 0, 1, 'L');//contenido de la celda


      $pdf->SetXY($x_documento2, 40); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Modelo de Facturacion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento2, 43); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $modelo_dte , 0, 1, 'L');//contenido de la celda 

      $pdf->SetXY($x_documento2, 46); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Tipo de Transmision:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento2, 49); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $tipo_dte , 0, 1, 'L');//contenido de la celda




      //DATOS DEL EMISOR DEL DOCUMENTO



      // Establecer la posición de la imagen
		$pdf->SetXY(8, 5);

		// Insertar imagen ajustada proporcionalmente al cuadro
		$pdf->Image(
			$imagen,
			'', '', // Posición X, Y (déjalos automáticos)
			$anchoMax,
			$altoMax,
			'', // Tipo de imagen
			'', // Link
			'', // Align
			false, // Resize (no estira la imagen a la fuerza)
			300, // DPI
			'', // Alt
			false, // isMask
			false, // imgMask
			0, // Border
			'L', // Fit box alignment (Left top corner)
			true // Fit box (mantiene proporción dentro del ancho/alto)
		);

      $x_emisor = 7;
      $x_emisor2 = 40;
      $y_emisor = 27;
      $y_emisor_desplasamiento = 4;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, $representante , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NIT: " . $nit , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_emisor2, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NRC: " . $nrc , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Giro: " . $giro , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;


      foreach ($direccion_parts as $part) {
          $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
          $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
          $pdf->Cell(0, 3, $part, 0, 1, 'L');
          $y_emisor = $y_emisor + $y_emisor_desplasamiento;
      }


      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Telefono: " . $tel , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "E-Mail: " . "facturacionelectronicagalo23@gmail.com" , 0, 1, 'L');//contenido de la celda

      // Imprimir una línea divisoria
      $pdf->Line(7, 58, 205, 58, array('width' => 0.5, 'color' => array(0,0,0)));




      //DATOS DEL CLIENTE 


      $x_cliente = 7;
      $x_cliente2 = 50;
      $y_cliente = 60;
      $y_cliente_desplasamiento = 4;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Cliente: ". $cliente , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Direccion: ". $direccion_cli , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Telefono: ". $tel_cli , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "E-Mail: ". $mail_cli , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NIT: ". $nit_cli , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NRC: ". $nrc_cli , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Giro: ". $giro_cli , 0, 1, 'L');//contenido de la celda

      // Imprimir una línea divisoria
      $pdf->Line(7, 80, 205, 80, array('width' => 0.5, 'color' => array(0,0,0)));



      //DETALLE DEL documento


      $y_detalle = 82;
      $y_detale_incremento = 4;

      $pdf->SetXY( 7, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "No." , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 12, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "CODIGO" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 33, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "MEDIDA" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 45, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "DESCRIPCION" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 118, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "CANTIDAD" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 132, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "PRECIO" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 144, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "DESCUENTO" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 160, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NO SUJETAS" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 176, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "EXENTAS" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 190, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "GRAVADAS" , 0, 1, 'L');//contenido de la celda

      // Imprimir una línea divisoria
      $pdf->Line(7, 88, 205, 88, array('width' => 0.5, 'color' => array(0,0,0)));

      $y_detalle = 90;
      $y_detale_incremento = 4;
  }


  $p_exento = 0.00;

  if ($p_exento > 0){
      $exentas = 0.00;
      $gravada = 0.00;
      $no_sujetas = 0.00;
  }else{
      $gravada = 0.00;
      $exentas =0.00;
      $no_sujetas = 0.00;
  }

  $pdf->SetXY( 7, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, $numItem , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 12, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, $codigo , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 33, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, 'UNID'  , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 118, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, $cantidad , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 132, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($precioUni,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 144, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($montoDescu,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 160, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($ventaNoSuj,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 176, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($ventaExenta,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 190, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($ventaGravada,2,'.',',') , 0, 1, 'L');//contenido de la celda

  $producto_cadena = $descripcion;

  $productos_parts = Salto_linea(60,$producto_cadena);
  
  foreach ($productos_parts as $producto_lineas){
      $pdf->SetXY( 45, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, $producto_lineas , 0, 1, 'L');//contenido de la celda
      $y_detalle = $y_detalle + $y_detale_incremento;
  }
}


$resumen = $data['resumen'];

$totalNoSuj = $resumen['totalNoSuj'];            // Total de operaciones no sujetas
$totalExenta = $resumen['totalExenta'];          // Total de ventas exentas
$totalGravada = $resumen['totalGravada'];        // Total de ventas gravadas
$subTotalVentas = $resumen['subTotalVentas'];    // Suma total antes de descuentos
$descuNoSuj = $resumen['descuNoSuj'];            // Descuento aplicado a ventas no sujetas
$descuExenta = $resumen['descuExenta'];          // Descuento en ventas exentas
$descuGravada = $resumen['descuGravada'];        // Descuento en ventas gravadas
$porcentajeDescuento = $resumen['porcentajeDescuento'];  // % global de descuento aplicado
$totalDescu = $resumen['totalDescu'];            // Total general de descuentos

$totalIva = $resumen['totalIva'];                // IVA total calculado
$subTotal = $resumen['subTotal'];                // Subtotal después de descuentos
$ivaRete1 = $resumen['ivaRete1'];                // IVA retenido (si aplica)
$reteRenta = $resumen['reteRenta'];              // Retención de renta (si aplica)
$montoTotalOperacion = $resumen['montoTotalOperacion'];  // Monto total de la operación
$totalNoGravado = $resumen['totalNoGravado'];    // Total de montos no gravados
$totalPagar = $resumen['totalPagar'];            // Monto total a pagar por el cliente
$totalLetras = $resumen['totalLetras'];          // Monto total en letras
$saldoFavor = $resumen['saldoFavor'];            // Saldo a favor del cliente (si aplica)
$condicionOperacion = $resumen['condicionOperacion']; // Condición de operación (ej. contado o crédito)
$pagos = $resumen['pagos'];                      // Detalles de pagos (puede ser null)
$numPagoElectronico = $resumen['numPagoElectronico']; // Número de pago electrónico (si aplica)

$nombEntrega = $data['extension']['nombEntrega'];
$nombRecibe = $data['extension']['nombRecibe'];
$observaciones_extension = $data['extension']['observaciones'];

$y_detalle = $max_y - 60;
// Imprimir una línea divisoria
$pdf->Line(7, $y_detalle, 205, $y_detalle, array('width' => 0.5, 'color' => array(0,0,0)));


$pdf->SetXY( 7, $max_y - 30); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Pagina: ".$pagianas , 0, 1, 'L');//contenido de la celda

//TOTALES DEL DOCUMENTO
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Sin Descuento: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $subTotalVentas , 0, 1, 'L');//contenido de la celda



$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "SON: " . $totalLetras , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Entrega: " . $nombEntrega , 0, 1, 'L');//contenido de la celda


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Descuento: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalDescu , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Recibe: " . $nombRecibe , 0, 1, 'L');//contenido de la celda


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Suma: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $subTotal , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;



$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Observaciones: " . $observaciones_extension , 0, 1, 'L');//contenido de la celda


if (!is_null($resumen['tributos'])) {
		$tributos = $resumen['tributos'];
	foreach ($tributos as $index => $tributo) {

		$tributo_codigo = $tributo['codigo'];
		$tributos_descrip = $tributo['descripcion'];
		$tributos_val = $tributo['valor'];

		$pdf->SetXY( 148, $y_detalle); //posicion de la celda
		$pdf->SetFont('helvetica', '', $texto); //formato de la celda
		$pdf->Cell(0, 3, $tributos_descrip , 0, 1, 'L');//contenido de la celda

		$pdf->SetXY( 187, $y_detalle); //posicion de la celda
		$pdf->SetFont('helvetica', '', $texto); //formato de la celda
		$pdf->Cell(0, 3, $tributos_val , 0, 1, 'L');//contenido de la celda
		$y_detalle = $y_detalle + $y_detale_incremento;

	}
}


if($totalExenta > 0){
$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Excentas: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalExenta , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;
}

if($totalNoSuj > 0){
$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total No Sujetas: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalNoSuj , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;
}

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"TOTAL: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($totalPagar,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Forma de Pago: " , 0, 1, 'L');//contenido de la celda

if ($condicionOperacion == 1) {
  $condicionOperacion = "Contado";
} elseif ($condicionOperacion == 2) {
  $condicionOperacion = "Crédito";
} else {
  $condicionOperacion = "No especificada";
}

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $condicionOperacion , 0, 1, 'L');//contenido de la celda


$example = $codigoGeneracion.".pdf";

if($print == '1'){
    $pdf->Output($example, 'I');
}else{
    $pdf->Output($example, 'D');
}
?>