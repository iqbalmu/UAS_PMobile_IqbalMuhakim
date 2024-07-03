// navbar.dart

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:outpatient_mobile/app/routes/app_pages.dart';

class MainNavbar extends StatelessWidget {
  final List<BottomNavigationBarItem> items = [
    const BottomNavigationBarItem(
      icon: Icon(Icons.home),
      label: 'Beranda',
    ),
    const BottomNavigationBarItem(
      icon: Icon(Icons.local_hospital_outlined),
      label: 'Janji Temu',
    ),
    const BottomNavigationBarItem(
      icon: Icon(Icons.payment),
      label: 'Transaksi',
    ),
    const BottomNavigationBarItem(
      icon: Icon(Icons.person),
      label: 'Profil',
    ),
  ];

  @override
  Widget build(BuildContext context) {
    return Obx(() {
      return SafeArea(
       child: BottomNavigationBar(
         backgroundColor: Theme.of(context).bottomNavigationBarTheme.backgroundColor,
         selectedItemColor: Theme.of(context).bottomNavigationBarTheme.selectedItemColor,
         unselectedItemColor: Theme.of(context).bottomNavigationBarTheme.unselectedItemColor,
         items: items,
         currentIndex: Get.find<NavController>().selectedIndex.value,
         onTap: (index) {
           Get.find<NavController>().selectedIndex.value = index;
           // Navigate to selected route
           switch (index) {
             case 0:
               Get.offAllNamed(Routes.HOME);
               break;
             case 1:
               Get.toNamed(Routes.JANJITEMU);
               break;
             case 2:
               Get.toNamed(Routes.TRANSACTION);
               break;
             case 3:
               Get.toNamed(Routes.PROFILE);
               break;
             default:
               Get.offAllNamed(Routes.HOME);
           }
         },
       ),
      );
    });
  }
}

class NavController extends GetxController {
  var selectedIndex = 0.obs;
}
