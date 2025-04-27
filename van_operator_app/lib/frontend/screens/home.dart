import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../../backend/providers/auth_provider.dart';
import '../widgets/drawer.dart';
import '../widgets/filters/trip_filters.dart';
import '../widgets/lists/trip_list.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Dashboard'),
        actions: [
          IconButton(
            icon: const Icon(Icons.logout),
            onPressed: () async {
              try {
                await Provider.of<AuthProvider>(
                  context,
                  listen: false,
                ).logout();
              } catch (e) {
                if (!context.mounted) return;
                ScaffoldMessenger.of(context).showSnackBar(
                  SnackBar(content: Text('Logout failed: ${e.toString()}')),
                );
              }
            },
          ),
        ],
      ),
      drawer: const MyDrawer(),
      body: const TripManagementView(),
    );
  }
}

class TripManagementView extends StatefulWidget {
  const TripManagementView({super.key});

  @override
  State<TripManagementView> createState() => _TripManagementViewState();
}

class _TripManagementViewState extends State<TripManagementView> {
  DateTimeRange? selectedDateRange;
  String filterStatus = 'All';

  void updateFilters(DateTimeRange? dateRange, String status) {
    setState(() {
      selectedDateRange = dateRange;
      filterStatus = status;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        TripFilters(
          selectedDateRange: selectedDateRange,
          filterStatus: filterStatus,
          onFiltersChanged: updateFilters,
        ),
        Expanded(
          child: TripList(
            selectedDateRange: selectedDateRange,
            filterStatus: filterStatus,
          ),
        ),
      ],
    );
  }
}
