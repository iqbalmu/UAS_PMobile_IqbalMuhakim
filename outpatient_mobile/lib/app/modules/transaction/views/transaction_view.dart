import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:outpatient_mobile/app/widgets/navbar.dart';

import '../controllers/transaction_controller.dart';

class TransactionView extends GetView<TransactionController> {
  TransactionView({super.key});
  @override
  Widget build(BuildContext context) {
    Get.lazyPut(() => NavController());

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
              'Data Transaksi',
              style: TextStyle(fontSize: 16),
            ),
            centerTitle: true,
            shadowColor: Colors.black,
          ),
        ),
      ),
      body: const Center(
        child: Text(
          'Belum Ada Transaksi',
          style: TextStyle(fontSize: 16),
        ),
      ),
      bottomNavigationBar: MainNavbar(),
    );
  }
}
