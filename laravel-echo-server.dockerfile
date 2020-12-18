FROM node:13.8-alpine

# timezone
RUN apk add --update --no-cache --virtual build-dependencies tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    echo "Asia/Tokyo" > /etc/timezone && \
    apk del build-dependencies

RUN npm install -g laravel-echo-server

WORKDIR /work

CMD ["laravel-echo-server", "start"]