[aliases]
test=pytest

[tool:pytest]
;when run pytest command, add --rootdir here will be effective, but
;the printed message of rootdir is only can be changed by command
;line, so never mind!
addopts = --rootdir=${pwd}/tests --cov-report=html:${pwd}/htmlcov --cov-branch --cov=${pwd}/service_p/  -vv --disable-warnings
