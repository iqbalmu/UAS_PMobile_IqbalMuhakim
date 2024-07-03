import 'package:get/get.dart';

import '../controllers/janjitemu_controller.dart';

class JanjitemuBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut<JanjitemuController>(
      () => JanjitemuController(),
    );
  }
}
