# Makefile for Yii Blog Demo Bootstrap
# (c) 2012 Joachim Werner <joachim.werner@diggin-data.de>

APP := blog-bootstrap
VERSION := 0.1

clean:
	rm -rf ../../assets/*
	rm -rf ../runtime/*

dist: clean
	touch ../../.do_install && \
	touch ../../assets/.yii && \
	touch ../runtime/.yii && \
	cd ../../.. && \
	    tar czf $(APP)_$(VERSION).tar.gz $(APP)/ --exclude=nbproject --exclude=.svn --exclude=*.php~ --exclude=files

newtar: clean
	cd ../../.. && \
	find $(APP) -ctime 1 \! -type d \! -name *.php~ > /tmp/$(APP)-newfiles && \
	tar czf $(APP)_$(VERSION).tar.gz -T /tmp/$(APP)-newfiles --transform 's,^kim-chi,,S' --exclude=files --exclude=assets
	# && \ rm /tmp/$(APP)-newfiles
