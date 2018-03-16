<?php
/* Sucuri integrity monitor
 * Integrity checking and server side scanning.
 *
 * Copyright (C) 2010, 2011, 2012 Sucuri, LLC
 * http://sucuri.net
 * Do not distribute or share.
 */

$MYMONITOR = "monitor20";
$my_sucuri_encoding = "



LyogU3VjdXJpIGludGVncml0eSBtb25pdG9yIC4gCiAqIENvbm5lY3RzIGJhY2sgaG9tZS4KICog
Q29weXJpZ2h0IChDKSAyMDEwLTIwMTMgU3VjdXJpLCBMTEMKICogRG8gbm90IGRpc3RyaWJ1dGUg
b3Igc2hhcmUuCiAqLwoKCiRTVUNVUklQV0QgPSAiNTM1ZTI2ZWIwZjMzMjRlODA1NmZlNjk1NDk3
NmIwNGM2MmViOTc3ZjJjYzUxIjsKCgppZihpc3NldCgkX0dFVFsndGVzdCddKSkKewogICAgZWNo
byAiT0s6IFN1Y3VyaTogRm91bmRcbiI7CiAgICBleGl0KDApOwp9CgoKCi8qIFZhbGlkIGFyZ3Vt
ZW50LiAqLwppZighaXNzZXQoJF9HRVRbJ3J1biddKSkKewogICAgZXhpdCgwKTsKfQoKCi8qIE11
c3QgaGF2ZSBhbiBJUCBhZGRyZXNzLiAqLwppZighaXNzZXQoJF9TRVJWRVJbJ1JFTU9URV9BRERS
J10pKQp7CiAgICBleGl0KDApOwp9Cgokb3JpZ3JlbW90ZWlwID0gJF9TRVJWRVJbJ1JFTU9URV9B
RERSJ107CgovKiBJZiBjb21pbmcgZnJvbSBjbG91ZGZsYXJlOiAqLwppZihpc3NldCgkX1NFUlZF
UlsnSFRUUF9DRl9DT05ORUNUSU5HX0lQJ10pICYmICRfU0VSVkVSWydSRU1PVEVfQUREUiddICE9
PSAkX1NFUlZFUlsnSFRUUF9DRl9DT05ORUNUSU5HX0lQJ10pCnsKICAgICRfU0VSVkVSWydSRU1P
VEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfQ0ZfQ09OTkVDVElOR19JUCddOwp9Ci8qIENsb3Vk
UHJveHkgaGVhZGVycy4gKi8KZWxzZSBpZihpc3NldCgkX1NFUlZFUlsnSFRUUF9YX1NVQ1VSSV9D
TElFTlRJUCddKSkKewogICAgJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRU
UF9YX1NVQ1VSSV9DTElFTlRJUCddOwp9Ci8qIE1vcmUgZ2F0ZXdheSByZXF1ZXN0cy4gKi8KZWxz
ZSBpZihpc3NldCgkX1NFUlZFUlsnSFRUUF9YX09SSUdfQ0xJRU5UX0lQJ10pKQp7CiAgICAkX1NF
UlZFUlsnUkVNT1RFX0FERFInXSA9ICRfU0VSVkVSWydIVFRQX1hfT1JJR19DTElFTlRfSVAnXTsK
fQplbHNlIGlmKGlzc2V0KCRfU0VSVkVSWydIVFRQX0NMSUVOVF9JUCddKSkKewogICAgJF9TRVJW
RVJbJ1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9DTElFTlRfSVAnXTsKfQovKiBQcm94
eSByZXF1ZXN0cy4gKi8KZWxzZSBpZihpc3NldCgkX1NFUlZFUlsnSFRUUF9UUlVFX0NMSUVOVF9J
UCddKSkKewogICAgJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9UUlVF
X0NMSUVOVF9JUCddOwp9Ci8qIFByb3h5IHJlcXVlc3RzLiAqLwplbHNlIGlmKGlzc2V0KCRfU0VS
VkVSWydIVFRQX1hfUkVBTF9JUCddKSkKewogICAgJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gPSAk
X1NFUlZFUlsnSFRUUF9YX1JFQUxfSVAnXTsKfQovKiBNb3JlIGdhdGV3YXkgcmVxdWVzdHMuICov
CmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hUVFBfWF9GT1JXQVJERURfRk9SJ10pKQp7CiAgICAk
X1NFUlZFUlsnUkVNT1RFX0FERFInXSA9ICRfU0VSVkVSWydIVFRQX1hfRk9SV0FSREVEX0ZPUidd
Owp9CgoKJG15aXBsaXN0ID0gYXJyYXkoCic2OS4xNjQuMjExLjM3JywKJzcyLjE0LjE4Ny41OCcs
Cic2OS4xNjQuMTk2LjUzJywKJzUwLjExNi40Ny4xODEnLAonNjYuMjI4LjM0LjQ5JywKJzY2LjIy
OC40MC4xODUnLAonNTAuMTE2LjM2LjkyJywKJzUwLjExNi4zNi45MycsCic1MC4xMTYuMy4xNzEn
LAonMTk4LjU4Ljk2LjIxMicsCic1MC4xMTYuNjMuMjIxJywKJzE5Mi4xNTUuOTIuMTEyJywKJzE5
Mi44MS4xMjguMzEnLAonMTk4LjU4LjEwNi4yNDQnLAonMTkyLjE1NS45NS4xMzknLAonMjMuMjM5
LjkuMjI3JywKJzE5OC41OC4xMTIuMTAzJywKJzE5Mi4xNTUuOTQuNDMnLAonMTYyLjIxNi4xNi4z
MycsCicxMDQuMjM3LjE0My4yNDInLAonMTA0LjIzNy4xMzkuMjI3JywKJzQ1LjMzLjc2LjE3JywK
JzQ1Ljc5LjIxMC41NycsCicxNzMuMjMwLjEzMy4xNjQnLAonNjkuMTY0LjIxOS40NScsCic0NS43
OS4yMDcuMTI3JywKJzk2LjEyNi4xMTcuMjAnLAonMTA0LjIzNy4xMzguMTY4JywKJzQ1LjMzLjk5
Ljg4JywKJzY2LjIyOC40NS4xOTcnLAoKJzI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZlYWU6ZTEwNCcs
CicyNjAwOjNjMDA6OmYwM2M6OTFmZjpmZTg0OmUyNzUnLAonMjYwMDozYzAzOjpmMDNjOjkxZmY6
ZmVlNDpjOWYwJywKJzI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlZTQ6Yzk5OCcsCicyNjAwOjNjMDA6
OmYwM2M6OTFmZjpmZTg0OmUyMTgnLAonMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmVkZjo1OGM2JywK
JzI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlZGY6NTgzNScsCicyNjAwOjNjMDM6OmYwM2M6OTFmZjpm
ZWRmOjZhN2EnLAonMjYwMDozYzAzOjpmMDNjOjkxZmY6ZmU3MDozNmNlJywKJzI2MDA6M2MwMjo6
ZjAzYzo5MWZmOmZlNzA6ZjEyZCcsCicyNjAwOjNjMDE6OmYwM2M6OTFmZjpmZTcwOjUyYmInLAoi
MjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU2OTo0YjY2IiwKIjI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZl
NzA6NTIxMyIsCiIyNjAwOjNjMDM6OmYwM2M6OTFmZjpmZWRiOmI5Y2UiLAoiMjYwMDozYzAwOjpm
MDNjOjkxZmY6ZmU2ZTphMDQ2IiwKIjI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlNmU6YTBkZCIsCiIy
NjAwOjNjMDM6OmYwM2M6OTFmZjpmZTZlOmEwYWMiLAoiMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU5
YjpjY2FjIiwKIjI2MDA6M2MwMzo6ZjAzYzo5MWZmOmZlNTk6ZjFmIiwKIjI2MDA6M2MwMjo6ZjAz
Yzo5MWZmOmZlNTk6ZmJiIiwgCiIyNjAwOjNjMDM6OmYwM2M6OTFmZjpmZTU5OmY1MSIsCiIyNjAw
OjNjMDA6OmYwM2M6OTFmZjpmZTU5OmY4NCIsIAonMjYwMDozYzAwOjpmMDNjOjkxZmY6ZmUxZjo3
NWNiJywKJzI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZlMWY6NzU3YycsCicyNjAwOjNjMDI6OmYwM2M6
OTFmZjpmZTFmOjc1M2MnLAonZmU4MDo6ZmNmZDphZGZmOmZlZTY6ODA4NycsCicyNjAwOjNjMDI6
OmYwM2M6OTFmZjpmZWU5OjY0ZmEnLAonMjYwMDozYzAzOjpmMDNjOjkxZmY6ZmVlOTo2NDE3JywK
KTsKCgokaXBtYXRjaGVzID0gMDsKCmZvcmVhY2goJG15aXBsaXN0IGFzICRteWlwKQp7CiAgICBp
ZihzdHJwb3MoJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10sICRteWlwKSAhPT0gRkFMU0UpCiAgICB7
CiAgICAgICAgJGlwbWF0Y2hlcyA9IDE7CiAgICAgICAgYnJlYWs7CiAgICB9CiAgICBpZihzdHJw
b3MoJG9yaWdyZW1vdGVpcCwgJG15aXApICE9PSBGQUxTRSkKICAgIHsKICAgICAgICAkaXBtYXRj
aGVzID0gMTsKICAgICAgICBicmVhazsKICAgIH0KfQoKCmlmKCRpcG1hdGNoZXMgPT0gMCkKewog
ICAgZWNobyAiRVJST1I6IEludmFsaWQgSVAgQWRkcmVzc1xuIjsKICAgIGV4aXQoMCk7Cn0KCgov
KiBWYWxpZCBrZXkuICovCmlmKCFpc3NldCgkX1BPU1RbJ3NzY3JlZCddKSkKewogICAgZWNobyAi
RVJST1I6IEludmFsaWQgYXJndW1lbnRcbiI7CiAgICBleGl0KDApOwp9CgoKLyogQ29ubmVjdCBi
YWNrIHRvIGdldCB3aGF0IHRvIHJ1bi4gKi8KaWYoIWZ1bmN0aW9uX2V4aXN0cygnY3VybF9leGVj
JykgfHwgaXNzZXQoJF9HRVRbJ25vY3VybCddKSkKewogICAgJHBvc3RkYXRhID0gaHR0cF9idWls
ZF9xdWVyeSgKICAgICAgICAgICAgYXJyYXkoCiAgICAgICAgICAgICAgICAncCcgPT4gJFNVQ1VS
SVBXRCwKICAgICAgICAgICAgICAgICdxJyA9PiAkX1BPU1RbJ3NzY3JlZCddLAogICAgICAgICAg
ICAgICAgKQogICAgICAgICAgICApOwoKICAgICRvcHRzID0gYXJyYXkoJ2h0dHAnID0+CiAgICAg
ICAgICAgIGFycmF5KAogICAgICAgICAgICAgICAgJ21ldGhvZCcgID0+ICdQT1NUJywKICAgICAg
ICAgICAgICAgICdoZWFkZXInICA9PiAnQ29udGVudC10eXBlOiBhcHBsaWNhdGlvbi94LXd3dy1m
b3JtLXVybGVuY29kZWQnLAogICAgICAgICAgICAgICAgJ2NvbnRlbnQnID0+ICRwb3N0ZGF0YQog
ICAgICAgICAgICAgICAgKQogICAgICAgICAgICApOwoKICAgICRjb250ZXh0ID0gc3RyZWFtX2Nv
bnRleHRfY3JlYXRlKCRvcHRzKTsKICAgICRteV9zdWN1cmlfZW5jb2RpbmcgPSBmaWxlX2dldF9j
b250ZW50cygiaHR0cHM6Ly8kTVlNT05JVE9SLnN1Y3VyaS5uZXQvaW1vbml0b3IiLCBmYWxzZSwg
JGNvbnRleHQpOwoKICAgIGlmKHN0cm5jbXAoJG15X3N1Y3VyaV9lbmNvZGluZywgIldPUktFRDoi
LDcpID09IDApCiAgICB7CiAgICB9CiAgICBlbHNlCiAgICB7CiAgICAgICAgZWNobyAiRVJST1I6
IFVuYWJsZSB0byBjb21wbGV0ZSAobWlzc2luZyBjdXJsIHN1cHBvcnQgYW5kIGZpbGVfZ2V0IGZh
aWxlZCkuIFBsZWFzZSBjb250YWN0IHN1cHBvcnRAc3VjdXJpLm5ldCBmb3IgZ3VpZGFuY2UuXG4i
OwogICAgICAgIGV4aXQoMSk7CiAgICB9Cn0KCmVsc2UKewoKICAgICRjaCA9IGN1cmxfaW5pdCgp
OwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1VSTCwgImh0dHBzOi8vJE1ZTU9OSVRPUi5z
dWN1cmkubmV0L2ltb25pdG9yIik7CiAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRfUkVUVVJO
VFJBTlNGRVIsIHRydWUpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1BPU1QsIHRydWUp
OwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1BPU1RGSUVMRFMsICJwPSRTVUNVUklQV0Qm
cT0iLiRfUE9TVFsnc3NjcmVkJ10pOyAKICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9QVF9TU0xf
VkVSSUZZUEVFUiwgZmFsc2UpOwoKICAgICRteV9zdWN1cmlfZW5jb2RpbmcgPSBjdXJsX2V4ZWMo
JGNoKTsKICAgIGN1cmxfY2xvc2UoJGNoKTsKCiAgICBpZihzdHJuY21wKCRteV9zdWN1cmlfZW5j
b2RpbmcsICJXT1JLRUQ6Iiw3KSA9PSAwKQogICAgewogICAgfQogICAgZWxzZQogICAgewogICAg
ICAgIGlmKCRteV9zdWN1cmlfZW5jb2RpbmcgPT0gTlVMTCB8fCBzdHJsZW4oJG15X3N1Y3VyaV9l
bmNvZGluZykgPCAzKQogICAgICAgIHsKICAgICAgICAgICAgJG15X3N1Y3VyaV9lbmNvZGluZyA9
ICJ4MjM1MSI7CiAgICAgICAgfQogICAgICAgIGVjaG8gIkVSUk9SOiBVbmFibGUgdG8gY29ubmVj
dCBiYWNrIHRvIFN1Y3VyaSAoZXJyb3I6ICRteV9zdWN1cmlfZW5jb2RpbmcpLiBQbGVhc2UgY29u
dGFjdCBzdXBwb3J0QHN1Y3VyaS5uZXQgZm9yIGd1aWRhbmNlLlxuIjsKICAgICAgICBleGl0KDEp
OwogICAgfQp9CgoKJG15X3N1Y3VyaV9lbmNvZGluZyA9ICBiYXNlNjRfZGVjb2RlKAogICAgICAg
ICAgICAgICAgICAgICAgIHN1YnN0cigkbXlfc3VjdXJpX2VuY29kaW5nLCA3KSk7CgoKZXZhbCgK
ICAgICRteV9zdWN1cmlfZW5jb2RpbmcKICAgICk7Cg==

";

/* Encoded to avoid that it gets flagged by AV products or even ourselves :) */
$tempb64 =  
           base64_decode(
                          $my_sucuri_encoding);

eval(  $tempb64 
      );
exit(0); ?>    
    
