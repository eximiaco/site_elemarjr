#######################################
# Run docker-compose following Aztlan
# structure
# Arguments:
#   The docker-compose command
# Returns:
#   None
#######################################
docker_compose() {
	# Load project variables
	. $(dirname $BASH_SOURCE)/aztlan_variables.sh

  # Check if the docker-compose command exists
  if [ ! $( command -v docker-compose ) ]; then
    >&2 echo "Command docker-compose doesn't exist"
    return
  fi

  COMPOSE="docker-compose -p ${PROJECT} -f ${ENV_ROOT_PATH}/environment/docker-compose.yml"
  [ 'Darwin' = ${OS} ] && COMPOSE+=" -f ${ENV_ROOT_PATH}/environment/docker-compose.mac.yml"

  VOLUME_PREFIX=${VOLUME_PREFIX} ${COMPOSE} $@
}

#######################################
# Run docker-compose dist configuration
# Arguments:
#   The docker-compose command
# Returns:
#   None
#######################################
docker_compose_dist() {
	# Load project variables
	. $(dirname $BASH_SOURCE)/aztlan_variables.sh

  . ./environment/env/build.env
  
  REGISTRY_ENDPOINT=${REGISTRY_ENDPOINT} REPOSITORY_NAME=${REPOSITORY_NAME} \
    docker-compose -p ${PROJECT}_dist -f environment/docker-compose.dist.yml $@
}
