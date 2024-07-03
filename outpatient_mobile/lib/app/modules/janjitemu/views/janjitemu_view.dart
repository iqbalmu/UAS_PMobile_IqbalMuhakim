import 'package:buttons_tabbar/buttons_tabbar.dart';
import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:outpatient_mobile/app/widgets/navbar.dart';

import '../controllers/janjitemu_controller.dart';

class JanjitemuView extends GetView<JanjitemuController> {
  const JanjitemuView({Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: PreferredSize(
        preferredSize: const Size.fromHeight(kToolbarHeight),
        child: Container(
          decoration: BoxDecoration(
            boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.3),
                spreadRadius: 0.3,
                blurRadius: 0.3,
                offset: const Offset(0, 0.5), // changes position of shadow
              ),
            ],
          ),
          child: AppBar(
            title: const Text(
              'Janji Temu',
              style: TextStyle(fontSize: 16),
            ),
            centerTitle: true,
            shadowColor: Colors.black,
          ),
        ),
      ),
      body: SafeArea(
        child: DefaultTabController(
          length: 2,
          child: Column(
            children: <Widget>[
              SizedBox(height: 10),
              ButtonsTabBar(
                backgroundColor: Color(0xFF16A085),
                width: Get.width / 2.5,
                contentCenter: true,
                radius: 15,
                unselectedBackgroundColor: Colors.grey[200],
                unselectedLabelStyle: TextStyle(color: Colors.black54),
                labelStyle:
                    TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
                tabs: [
                  Tab(
                    icon: Icon(Icons.location_on_outlined),
                    text: "Janji",
                  ),
                  Tab(
                    icon: Icon(Icons.history),
                    text: "Riwayat",
                  ),
                ],
              ),
              Expanded(
                child: TabBarView(
                  children: <Widget>[
                    Center(
                      child: Text("Janji Temu Belum Dibuat"),
                    ),
                    Center(
                      child: Text("Riwayat Kosong"),
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
      bottomNavigationBar: MainNavbar(),
    );
  }
}
