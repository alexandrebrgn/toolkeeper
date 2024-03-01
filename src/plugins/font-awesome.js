import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { // Import les icônes voulues
  faPlus,
  faPencil,
  faEye,
  faHome,
  faUser,
  faUserPlus,
  faSignInAlt,
  faSignOutAlt,
  faFireExtinguisher,
  faAirFreshener,
  faCar,
} from "@fortawesome/free-solid-svg-icons";

library.add(faAirFreshener, faCar, faPlus, faFireExtinguisher, faPencil, faEye, faHome, faUser, faUserPlus, faSignInAlt, faSignOutAlt);

export { FontAwesomeIcon };