import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../../backend/models/trip.dart';
import '../detail_row.dart';

class TripOverviewCard extends StatelessWidget {
  final TripAssigned trip;

  const TripOverviewCard({super.key, required this.trip});

  Color _getStatusColor(String status) {
    switch (status) {
      case 'Completed':
        return Colors.green;
      case 'In Progress':
        return Colors.blue;
      case 'Scheduled':
        return Colors.orange;
      case 'Cancelled':
        return Colors.red;
      default:
        return Colors.grey;
    }
  }

  @override
  Widget build(BuildContext context) {
    return Card(
      elevation: 4,
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Row(
              children: [
                Icon(
                  Icons.directions_car,
                  size: 32,
                  color: _getStatusColor(trip.tripStatus),
                ),
                const SizedBox(width: 12),
                Text(
                  'Van #${trip.vanId}',
                  style: GoogleFonts.poppins(
                    fontSize: 20,
                    fontWeight: FontWeight.w600,
                  ),
                ),
                const Spacer(),
                Chip(
                  backgroundColor: _getStatusColor(
                    trip.tripStatus,
                  ).withOpacity(0.2),
                  label: Text(
                    trip.tripStatus,
                    style: GoogleFonts.poppins(
                      fontSize: 14,
                      color: _getStatusColor(trip.tripStatus),
                      fontWeight: FontWeight.w500,
                    ),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 16),
            DetailRow(
              icon: Icons.route,
              label: 'Route',
              value: '${trip.sourceRoute} → ${trip.destinationRoute}',
            ),
            const SizedBox(height: 8),
            DetailRow(
              icon: Icons.access_time,
              label: 'Time',
              value: '${trip.startTime} - ${trip.endTime}',
            ),
            const SizedBox(height: 8),
            DetailRow(
              icon: Icons.calendar_today,
              label: 'Date',
              value: trip.dateOfTrip,
            ),
            const SizedBox(height: 8),
            DetailRow(
              icon: Icons.info,
              label: 'Status',
              value: trip.tripStatus,
            ),
          ],
        ),
      ),
    );
  }
}
