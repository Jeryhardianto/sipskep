#!/usr/bin/env bash
# Deploy ke vm-gpu: rsync source, build image, restart.
# Alias SSH `vm-gpu` didefinisikan di dev-ops/home-server/config.
set -euo pipefail

HOST=${DEPLOY_HOST:-vm-gpu}
DIR=${DEPLOY_DIR:-/home/vm-gpu/sipskep}

# Tanpa --delete-excluded: .env.prod di VM harus selamat dari --delete.
rsync -az --delete \
  --exclude '.git' \
  --exclude '.env*' \
  --exclude '.DS_Store' \
  ./ "$HOST:$DIR/"

C="docker compose --env-file .env.prod -f compose.prod.yaml"
ssh "$HOST" "cd $DIR && $C up -d --build"
ssh "$HOST" "cd $DIR && $C ps"
